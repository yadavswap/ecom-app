@extends('front.layouts.master')
@section('content')
    <div class="container">

        <div class="row">

            <div class="col-md-12" id="register">

                <div class="card col-md-8">
                    <div class="card-body">
                        @if (session()->has('msg'))
                            <div class="alert alert-success">
                                {{ session()->get('msg') }}
                            </div>
                        @endif

                        <h2 class="card-title">Sign Up</h2>
                        <hr>

                        <form action="{{ route('user.register.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="name" name="name" placeholder="Name" id="name" class="form-control"
                                    value="{{ old('name') }}">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" placeholder="Email" id="email" class="form-control"
                                    value="{{ old('email') }}">
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>

                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" placeholder="Password" id="password"
                                    class="form-control" value="{{ old('password') }}">
                                <span
                                    class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>

                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password:</label>
                                <input type="password" name="password_confirmation" placeholder="Password" id="password"
                                    class="form-control" value="{{ old('password_confirmation') }}">
                                <span
                                    class="text-danger">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}</span>

                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea type="text" name="address" placeholder="Address" id="address" class="form-control">{{ old('address') }}</textarea>
                                <span
                                    class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>

                            </div>

                            <div class="form-group">
                                <button class="btn btn-outline-info col-md-2"> Sign Up</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
