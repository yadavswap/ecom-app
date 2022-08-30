@extends('admin.layouts.master')
@section('content')
@section('page')
    View Products
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
                <h4 class="title">All Products</h4>
                <p class="category">List of all stock</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>
                                   @foreach ($order->products as $item)
                                        <table class="table">
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                            </tr>
                                        </table>
                                    @endforeach
                                </td>
                                <td>
                                   @foreach ($order->orderItems as $item)
                                        <table class="table">
                                            <tr>
                                                <td>{{ $item->quantity }}</td>
                                            </tr>
                                        </table>
                                    @endforeach
                                  
                                </td>
                     
                                <td>
                                  @if ($order->status)
                                       <a href="{{ route('order.confirm', $order->id) }}"> <span class="label label-success">Confirmed</span></a>
                                    @else
                                        <a href="{{ route('order.pending', $order->id) }}">  <span class="label label-danger">Pending</span></a>
                                    @endif
                                </td>
                                <td>
                                    {{--  <a class="btn btn-sm btn-info ti-pencil-alt" title="Edit"
                                        href="{{ route('product.edit', $order->id) }}"></a>
                                    <a class="btn btn-sm btn-danger ti-trash" title="Delete"
                                        href="{{ route('pro.delete', $order->id) }}"></a>  --}}
                                    <a class="btn btn-sm btn-primary ti-view-list-alt" title="Details"
                                        href="{{ route('order.show', $order->id) }}"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection