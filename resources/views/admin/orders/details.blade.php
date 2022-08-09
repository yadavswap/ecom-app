@extends('admin.layouts.master')
@section('content')
@section('page')
    Order Details
@endsection
<div class="row">
    @if (session()->has('msg'))
        <div class="alert alert-success">
            {{ session()->get('msg') }}
        </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Order Details</h4>
                <p class="category">Order Details</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        
                            <td>
                               {{$data->id}}
                            </td>
                            <td>{{$data->date}}</td>
                            <td>{{$data->orderItems[0]->quantity}}</td>

                            <td>
                                {{$data->address}}
                            </td>
                            <td>
                                Rs {{$data->orderItems[0]->price}}
                            </td>
                            <td>
                                {{--  <span class="label label-success">Confirmed</span></a>  --}}
                                @if ($data->orderItems[0]->status)
                                       <a href="{{ route('order.confirm', $data->id) }}"> <span class="label label-success">Confirmed</span></a>
                                    @else
                                        <a href="{{ route('order.pending', $data->id) }}">  <span class="label label-danger">Pending</span></a>
                                    @endif
                            </td>
                            
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">User Detail</h4>
                    <p class="category">User Detail</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{$data->user->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{$data->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$data->user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Registred At</th>
                                            <td>{{$data->user->created_at}}</td>
                                        </tr>
                                     
                                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--  --}}
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Product Detail</h4>
                    <p class="category">Product Detail</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <tbody>
                                           <tr>
                                            <th>ID</th>
                                            <td>{{$data->products[0]->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{$data->products[0]->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>{{$data->products[0]->price}}</td>
                                        </tr>
                                       <tr>
                                            <th>Image</th>
                                            <td><img src="{{ asset('uploads/' . $data->products[0]->image) }}" alt="" class="img-thumbnail" style="width: 150px;"></td>
                                        </tr>
                                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
