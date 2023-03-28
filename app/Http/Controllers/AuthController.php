<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){

        $validator=$this->validateData($request);

        if($validator->fails()) {
            return  response()->json(['errors' => $validator->errors(),'status'=>400],200);
        }

        $imageName=$this->saveImage($request->file,$request->email);

        $res=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'photo'=>$imageName,
            'password'=>Hash::make($request->password),
        ]);

        if($res){
            return response()->json(['msg'=>'user created','status'=>200],200);
        }
    }

    public function login(Request $request){
        $userData=User::where("email", $request->email)->first();
        if($userData){
            if(Hash::check($request->password, $userData->password)){
                $token=$userData->createToken($userData->email)->plainTextToken;
                return  response()->json(['token' => $token,'status'=>200],200); 
            }else{
                return  response()->json(['error' => "user not found",'status'=>400],200); 
            }
        }else{
            return  response()->json(['error' => "user not found",'status'=>400],200);
        }
    }

    public function validateData($request){

        return Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'phone' => ['required', 'min:10', 'max:10'],
            'password' => ['required', 'string', 'min:4'],
        ]);

    }

    public function saveImage($file,$email){
        $mail=explode('@',$email)[0];
        $imageName=$mail.'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads/images/'),$imageName);
        return $imageName;
    }
}
