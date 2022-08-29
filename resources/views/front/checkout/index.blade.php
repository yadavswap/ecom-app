@extends('front.layouts.master')
@section('content')
    <!-- Page Content -->
    <h2 class="mt-5"><i class="fa  fa-credit-card-alt"></i> Checkout</h2>
    <hr>
    <div class="row">
        <div class="col-md-7">
            <h4>Billing Details</h4>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" placeholder="City">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="provance">Provance</label>
                        <input type="text" class="form-control" id="provance" placeholder="Provance">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="postal">Postal</label>
                        <input type="text" class="form-control" id="postal" placeholder="Postal">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Phone">
                </div>
                <hr>
                <h5><i class="fa fa-credit-card"></i> Payment Details</h5>
                <div class="form-group">
                    <label for="name_card">Name on card</label>
                    <input type="text" class="form-control" id="name_card" placeholder="Name on card">
                </div>
                <div class="form-group">
                    <label for="card">Credit or debit card</label>
                    <input type="text" class="form-control" id="card" placeholder="Credit or debit card">
                </div>
                <button type="submit" class="btn btn-outline-info col-md-12">Complete Order</button>
            </form>
        </div>
        <div class="col-md-5">
            <h4>Your Order</h4>
            <table class="table your-order-table">
                <tr>
                    <th>Image</th>
                    <th>Details</th>
                    <th>Qty</th>
                </tr>
                @foreach(Cart::instance('default')->content() as  $item)
                    
                <tr>
                 @php
                                $description = App\product::find($item->id);
                            @endphp
                    <td><img src="{{ asset('uploads' . '/' . $description->image) }}" alt="" style="width: 4em"></td>
                    <td>
                     
                        <strong>{{$item->name}}</strong><br>
                       {{ $description->description }} <br>
                        <span class="text-dark">Rs. {{$item->price}}</span>
                    </td>
                    <td>
                        <span class="badge badge-light">1</span>
                    </td>
                </tr>
                               @endforeach

            </table>
            <hr>
            <table class="table your-order-table table-bordered">
                <tr>
                    <th colspan="2" ">Price Details</th>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td>Rs. {{ Cart::subtotal() }}</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>Rs. {{ Cart::tax() }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <th>Rs. {{ Cart::total() }}</th>
                        </tr>
                    </table>
                </div>
            </div>
    <!-- /.container -->
@endsection
