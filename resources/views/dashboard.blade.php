@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center align-item-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        User Detail
                        <a href="#" onclick="logout()">Logout</a>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-sm-1">Name:</div>
                                <div class="col-sm-11" id="name"></div> 

                                <div class="col-sm-1">Email:</div>
                                <div class="col-sm-11" id="email"></div> 

                                <div class="col-sm-1">Phone:</div>
                                <div class="col-sm-11" id="phone"></div>
                                
                                <div class="col-sm-1">Photo</div>
                                <div class="col-sm-12 mt-2">
                                    <img src="" alt="" height="50" width="100" id="image">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>       
$(document).ready(function(){
    const access_token=localStorage.getItem('access_token');
    if(access_token){
            $.ajax({
            url: "/api/user/",
            type: "get",
            headers: { Authorization: 'Bearer '+access_token },
            success: function(res){
                if(res){
                    $('#name').text(res.name)
                    $('#email').text(res.email)
                    $('#phone').text(res.phone)
                    $('#image').attr('src','/uploads/images/'+res.photo);
                }
            }
        });
    }else{
        window.location="/login";
    }
});

function logout(){
    localStorage.setItem('access_token','');
    window.location="/login";
}
</script>
@endsection