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
                            <th>Name</th>
                            <th>Price</th>
                            <th>Desc</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td><img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->image }}"
                                        class="img-thumbnail" style="width: 50px"></td>
                                <td>
                                    <a class="btn btn-sm btn-info ti-pencil-alt" title="Edit"
                                        href="{{ route('product.edit', $product->id) }}"></a>
                                    <a class="btn btn-sm btn-danger ti-trash" title="Delete"
                                        href="{{ route('pro.delete', $product->id) }}"></a>
                                    <button class="btn btn-sm btn-primary ti-view-list-alt" title="Details"></button>
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
