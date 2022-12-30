@extends('layouts.homeLayout')

@section('content')
<section id="form">

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <input type="text"  name="name" id="name" required placeholder="Name"/>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="email" name="email" id="email" placeholder="Email Address"/>
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="phone" name="phone" id="phone" required pattern="[0-9]{2,}" placeholder="Phone Number"/>
                        @error('phone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="text"  name="address" id="name" required placeholder="Delivery Address"/>
                        @error('address')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="password" name="password" id="password" placeholder="Password" required autocomplete/>
                        @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Confirm Password"/>
                        @error('password_confirmation')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <input class="hidden" type="text"  name="user_id" id="name" required value="{{'GUAS_'.random_int(0000001, 9000000)}}" />
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->

@endsection