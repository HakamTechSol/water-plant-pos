<?php $page = "Sign In - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<Form action="{{ route('signin.custom') }}" method="POST" class="account-content">
    @csrf
    <div class="login-wrapper">
        <div class="login-content" style="background-color:#CDD0D5">
            <div class="login-userset">
                <div class="login-logo">
                    <img src="{{URL::asset('/assets/img/Pure_Water-1.png')}}" alt="img">
                </div>
                <div class="login-userheading">
                    <h3>Sign In</h3>
                    <h4>Please login to your account</h4>
                </div>
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-- <form action="{{route('signin1')}}" method="post">
                    @csrf -->
                <div class="form-login">
                    <label>Email</label>
                    <div class="form-addons">
                        <input type="text" name="email" id="Email" value="admin@example.com">
                        <img src="{{URL::asset('/assets/img/icons/mail.svg')}}" alt="img">
                    </div>
                    <div class="text-danger pt-2">
                        @error('0')
                        {{$message}}
                        @enderror
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-login">
                    <label>Password</label>
                    <div class="pass-group">
                        <input type="password" class="pass-input" name="password" id="password" value="123456">
                        <span class="fas toggle-password fa-eye-slash"></span>
                    </div>
                    <div class="text-danger pt-2">
                        @error('0')
                        {{$message}}
                        @enderror
                        @error('password')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-login">
                    <div class="alreadyuser">
                        <!-- <h4><a href="{{url('forgetpassword')}}" class="hover-a">Forgot Password?</a></h4> -->
                    </div>
                </div>
                <div class="form-login">
                    <button class="btn btn-login" type="submit">Sign In</button>
                </div>
                <!-- </form> -->
                <div class="signinform text-center">
                    <!-- <h4>Don’t have an account? <a href="{{url('signup')}}" class="hover-a">Sign Up</a></h4> -->
                </div>
                <!-- <div class="form-setlogin">
                    <h4>Or sign up with</h4>
                </div>
                <div class="form-sociallink">
                    <ul>
                        <li>
                            <a href="javascript:void(0);">
                                <img src="{{ URL::asset('/assets/img/icons/google.png')}}" class="me-2" alt="google">
                                Sign Up using Google
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <img src="{{ URL::asset('/assets/img/icons/facebook.png')}}" class="me-2" alt="google">
                                Sign Up using Facebook
                            </a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
        <div class="login-img">
            <img src="{{ url('/assets/img/signin.jpeg')}}" alt="img" >
        </div>
    </div>
</Form>
@endsection
