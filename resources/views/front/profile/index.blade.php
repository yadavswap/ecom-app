@extends('front.layouts.master')
@section('content')
    <h2>Profile</h2>
    <hr>
    <h3>User Details</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2">User Details <a href="" class="pullright">
                <i class="fa fa-cogs">Edit Profile</i></a>
                </th>
            <tr>
            <tr>
                <th>ID</th>
                <th>{{ $user->id }}</th>

            </tr>
            <tr>
                <th>Name</th>
                <th>{{ $user->name }}</th>

            </tr>
            <tr>
                <th>Email</th>
                <th>{{ $user->email }}</th>

            </tr>
            <tr>
                <th>Registed At</th>
                <th>{{ $user->created_at }}</th>

            </tr>
        </thead>
    </table>
@endsection
