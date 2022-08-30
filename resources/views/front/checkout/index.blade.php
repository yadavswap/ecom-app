@extends('front.layouts.master')
@section('content')
    <!-- Page Content -->
    <h2 class="mt-5"><i class="fa  fa-credit-card-alt"></i> Checkout</h2>
    <hr>
    <div class="row">
        <div class="col-md-7">
            <h4>Billing Details</h4>
            <form id="payment-form" method="post" action={{ route('checkout') }}>
                @csrf
                <div class="form-group">
                    <input type="hidden" name="amount" class="form-control" id="exampleInputPassword1"
                        value='{{ Cart::total() }}'>
                    <input type="hidden" name="name" class="form-control" id="exampleInputPassword1" value='Test'>
                    <input type="hidden" name="description" class="form-control" id="exampleInputPassword1"
                        value='Test description'>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="provance">Provance</label>
                        <input type="text" class="form-control" id="provance" name="provance" placeholder="Provance">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="postal">Postal</label>
                        <input type="text" class="form-control" id="postal" name="postal" placeholder="Postal">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                </div>
                <hr>
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
                @foreach (Cart::instance('default')->content() as $item)
                    <tr>
                        @php
                            $description = App\product::find($item->id);
                        @endphp
                        <input type="hidden" name="name" class="form-control" id="exampleInputPassword1"
                            value='{{ $item->name }}'>
                        <input type="hidden" name="description" class="form-control" id="exampleInputPassword1"
                            value='{{ $description->description }}'>
                        <td><img src="{{ asset('uploads' . '/' . $description->image) }}" alt="" style="width: 4em">
                        </td>
                        <td>
                            <strong>{{ $item->name }}</strong><br>
                            {{ $description->description }} <br>
                            <span class="text-dark">Rs. {{ $item->price }}</span>
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
