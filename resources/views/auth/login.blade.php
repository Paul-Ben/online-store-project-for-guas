@extends('layouts.homeLayout')

@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <input id="email" name="email" type="email" placeholder="Email Address" required autofocus value="{{old('email')}}"/>
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="password" id="password" name="password" placeholder="Password" required autocomplete="{{old('password')}}"/>
                        @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                        <span>    
                            <input id="remember_me" name="remember" type="checkbox" class="checkbox"> 
                            Keep me signed in
                        </span>
                        <span>
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                            <a class="gap-5" href="{{ route('password.request') }}">Forgot Password</a>
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            {{-- <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div> --}}
            
        </div>
        
    </div>
       
</section><!--/form-->

@endsection