@extends('front.layouts.master')
@section('content')
    <div class="container">
        <h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Shooping Cart</h2>
        <hr>
        @if (Cart::instance('default')->count() > 0)
            <h4 class="mt-5">4 items(s) in Shopping Cart</h4>
            <div class="cart-items">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('msg'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session()->get('msg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <table class="table">
                            <tbody>
                                @foreach (Cart::instance('default')->content() as $item)
                                    <tr>
                                        @php
                                            $description = App\product::find($item->id);
                                        @endphp
                                        <td><img src="{{ asset('uploads' . '/' . $description->image) }}"
                                                style="width: 5em">
                                        </td>
                                        <td>
                                            <strong>{{ $item->name }}</strong><br> {{ $description->description }}
                                        </td>
                                        <td>
                                            <form action={{ route('cart.destroy', $item->rowId) }} method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-link btn-large">Remove</button><br>
                                            </form>
                                            <a href="{{ route('cart.saveForLater', $item->rowId) }}">Save for later</a>
                                        </td>
                                        <td>
                                            <select name="" id="" class="form-control" style="width: 4.7em">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                            </select>
                                        </td>
                                        <td>Rs. {{ $item->total() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Price Details -->
                    <div class="col-md-6">
                        <div class="sub-total">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2">Price Details</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Subtotal </td>
                                    <td>{{ Cart::subtotal() }}</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>{{ Cart::tax() }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th>{{ Cart::total() }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- Save for later  -->
                    <div class="col-md-12">
                        <button class="btn btn-outline-dark">Continue Shopping</button>
                        <a href={{ route('checkout') }} class="btn btn-outline-info">Proceed to checkout</a>
                        <hr>
                    </div>
                @else
                    <h1> There Is no Item in Cart !</h1>
                    <a href="/"class="btn btn-outline-dark">Continue Shopping</a>
        @endif
        <div class="col-md-12">
            {{-- @if (session()->has('msg'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session()->get('msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif --}}
            <h4>{{ Cart::instance('saveForLater')->count() }} items Save for Later</h4>
            <table class="table">
                <tbody>
                    @foreach (Cart::instance('saveForLater')->content() as $item)
                        <tr>
                            @php
                                $description = App\product::find($item->id);
                            @endphp
                            <td><img src="{{ asset('uploads' . '/' . $description->image) }}" style="width: 5em"></td>
                            <td>
                                <strong>{{ $item->name }}</strong><br> {{ $description->description }}
                            </td>
                            <td>
                                <form action={{ route('cart.saveForLaterDestroy', $item->rowId) }} method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-link btn-large">Remove</button><br>
                                </form>
                                <a href="{{ route('cart.moveToCart', $item->rowId) }}">Move to Cart</a>
                            </td>
                            <td>
                                <select name="" id="" class="form-control" style="width: 4.7em">
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                            </td>
                            <td>Rs. {{ $item->total() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
@endsection
