@extends('admin.layouts.master')
@section('content')
@section('page')
    Edit Product
@endsection
<div class="row">
    <div class="col-lg-10 col-md-10">
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Product</h4>
            </div>
            <div class="content">
                @if(session()->has('msg'))
                <div class="alert alert-success">
                {{session()->get('msg')}}
                </div>
                @endif
                <form action="{{route('pro.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                    <div class="row">
                        {{--  @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif  --}}
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label>Product Name:</label>
                                <input type="text" class="form-control border-input" name="name"
                                    placeholder="Macbook pro" value={{$product->name}}>
                                <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                            </div>

                            <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                                <label>Product Price:</label>
                                <input type="text" class="form-control border-input" name="price"
                                    placeholder="RS.2500"  value={{$product->price}}>
                                <span class="text-danger">{{$errors->has('price') ? $errors->first('price') : ''}}</span>

                            </div>

                            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label>Product Description:</label>
                                <textarea id="" cols="30" rows="10" class="form-control border-input"
                                    placeholder="Product Description" name="description" >{{$product->description}}</textarea>
                                    <span class="text-danger">{{$errors->has('description') ? $errors->first('description') : ''}}</span>

                            </div>

                            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label>Product Image:</label>
                                <input type="file" class="form-control border-input" value={{$product->image}} name="image" id="image">
                                <span class="text-danger">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
                                   <div id="image-holder"> </div>

                            </div>

                        </div>

                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Product</button>
                    </div>

                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$("#image").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;

     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-holder");
     image_holder.empty();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {

             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {

                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image"
                     }).appendTo(image_holder);
                 }

                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });

</script>
@endsection
