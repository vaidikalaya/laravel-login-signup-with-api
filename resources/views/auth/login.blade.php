@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center align-item-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form onsubmit="login(event)" id="loginForm">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>

                                <div>
                                    <button class="btn btn-primary">Login</button>
                                    <h6 class="mt-3 mb-0">
                                        Don't have an account 
                                        <a href="/register">register</a>
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

    function login(event){
        event.preventDefault();

        var formData=$('#loginForm').serialize();
        
        $.ajax({
            type:'POST',
            url:"/api/login",
            data:formData,
            success:function(res){
                if(res.status===200){
                    localStorage.setItem('access_token', res.token)
                    window.location="/dashboard";
                }
                if(res.status===400){
                    console.log(res);
                }
            },
        });

    }
</script>
@endsection