
@extends('layouts.apps')

@section('content')
<div class="auth mt-4 d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-header">
            <h5 class="title">Register</h5>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <h6 class="text-success">{{ Session::get('success') }}</h6>
            @endif
            @if(Session::has('error'))
            <h6 class="text-danger">{{ Session::get('error') }}</h6>
            @endif
            <form action="{{ Route('auth.register') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="exampleName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control form-control-sm" id="exampleName">
                    @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <label for="exampleUsername" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control form-control-sm" id="exampleUsername">
                            @error('username')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <label for="examplePhone" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control form-control-sm" id="examplePhone">
                            @error('phone')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1">
                            @error('email')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <label for="exampleInputRefer" class="form-label">Referral Code</label>
                            <input type="text" name="referral_code" class="form-control form-control-sm" id="exampleInputRefer">
                            @error('referral_code')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                            @error('password')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <label for="exampleConfirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="confirmation_password" class="form-control form-control-sm" id="exampleConfirmPassword">
                        </div>
                    </div>
                </div>
                <div class="mb-4 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection