@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center align-item-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header pt-3">
                        <h4>
                            Register
                            <span class="alert alert-success d-none"></span>
                        </h4>
                        
                    </div>
                    <div class="card-body">
                        <form onsubmit="register(event)" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" placeholder="name">
                                        <label for="name">Name</label>
                                        <span class="text-danger" id="name-error"></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" placeholder="email">
                                        <label for="email">Email</label>
                                        <span class="text-danger" id="email-error"></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="phone" placeholder="phone">
                                        <label for="phone">Phone</label>
                                        <span class="text-danger" id="phone-error"></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password" placeholder="password">
                                        <label for="password">Password</label>
                                        <span class="text-danger" id="password-error"></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="file">Upload Photo</label>
                                        <input type="file" class="form-control" id="file">
                                    </div>
                                </div>

                                <div>
                                    <button class="btn btn-primary">Register</button>
                                    <h6 class="mt-3 mb-0">
                                        have an account 
                                        <a href="/login">login</a>
                                    </h6>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function register(event){
        event.preventDefault();
        
        let formData=new FormData();
        formData.append('file',$('#file')[0].files[0]);
        formData.append('name',$('#name')[0].value);
        formData.append('email',$('#email')[0].value);
        formData.append('phone',$('#phone')[0].value);
        formData.append('password',$('#password')[0].value);
        
        $.ajax({
            type:'POST',
            url:"/api/register",
            data:formData,
            contentType: false,
            processData: false,
            success:function(res){
                if(res.status===200){
                    $('.alert-success').removeClass('d-none');
                    $('.alert-success').text(res.msg);
                }
                if(res.status===400){
                    $.each(res.errors,function(error,value){
                        let errVar='#'+error+'-error';
                        $(errVar).text(value);
                    });
                }
            },
        });

    }
</script>
@endsection