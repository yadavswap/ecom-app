@extends('admin.layouts.master')

@section('page')
    Order Details
@endsection


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Order Details</h4>
                    <p class="category">Order details</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Address</th>
                                <th>Status</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->address }}</td>
                                <td>
                                   @if ($data->status)
                                       <a href="{{ route('order.confirm', $data->id) }}"> <span class="label label-success">Confirmed</span></a>
                                    @else
                                        <a href="{{ route('order.pending', $data->id) }}">  <span class="label label-danger">Pending</span></a>
                                    @endif
                                </td>
                                {{-- <td>
                                    @if ($data->status)
                                    {{ route('order.pending','Pending', $data->id, ['class'=>'btn btn-warning btn-sm']) }}
                                @else
                                    {{ route('order.confirm','Confirm', $data->id, ['class'=>'btn btn-success btn-sm']) }}
                                @endif  </td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">User Details</h4>
                    <p class="category">User Details</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <td>{{ $data->user->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $data->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $data->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Registered At</th>
                                <td>{{ $data->user->created_at->diffForHumans() }}</td>
                            </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Product Details</h4>
                    <p class="category">Product Details</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                        </tr>
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>
                                @foreach ($data->products as $product)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>

                            <td>
                                @foreach ($data->orderItems as $item)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $item->price }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($data->orderItems as $item)
                                    <table class="table">
                                        <tr>
                                            <td>{{ $item->quantity }}</td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($data->products as $product)
                                    <table class="table">
                                        <tr>
                                            <td><img src="{{ url('uploads') . '/' . $product->image }}" alt=""
                                                    style="width: 2em"></td>
                                        </tr>
                                    </table>
                                @endforeach
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <a href="{{ url('/order') }}" class="btn btn-success">Back to Orders</a>
@endsection
