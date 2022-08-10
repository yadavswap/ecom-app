@extends('admin.layouts.master')
@section('content')
@section('page')
Dashboard
@endsection
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-warning text-center">
                            <i class="ti-eye"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Total Visitors</p>
                            11022
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                     <a href="{{route('user.index')}}"> <div class="stats">
                      <i class="ti-panel"></i> Details
                    </div></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-success text-center">
                            <i class="ti-archive"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Products</p>
                            Rs {{$products->count()}}
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <a href="{{route('product.index')}}"> <div class="stats">
                        <i class="ti-panel"></i> Details
                    </div></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-danger text-center">
                            <i class="ti-shopping-cart-full"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Orders</p>
                           {{$orders->count()}}
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                  <a href="{{route('order.index')}}">  <div class="stats">
                        <i class="ti-panel"></i> Details
                    </div></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-info text-center">
                            <i class="ti-user"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Users</p>
                             {{$users->count()}}
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                 <a href="{{route('user.index')}}">    <div class="stats">
                        <i class="ti-panel"></i> Details
                    </div></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
