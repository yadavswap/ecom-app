@extends('admin.layouts.master')
@section('content')
@section('page')
    Add Product
@endsection
<div class="row">
    <div class="col-lg-10 col-md-10">
        <div class="card">
            <div class="header">
                <h4 class="title">Add Product</h4>
            </div>
            <div class="content">
                <form action="{{route('product.store')}}"  method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product Name:</label>
                                <input type="text" class="form-control border-input" name="name" placeholder="Macbook pro">
                            </div>

                            <div class="form-group">
                                <label>Product Price:</label>
                                <input type="text" class="form-control border-input"  name="price" placeholder="$2500">
                            </div>

                            <div class="form-group">
                                <label>Product Description:</label>
                                <textarea  id="" cols="30" rows="10" class="form-control border-input"
                                    placeholder="Product Description" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Product Image:</label>
                                <input type="file" class="form-control border-input" name="image">
                            </div>

                        </div>

                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Product</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
