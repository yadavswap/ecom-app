@extends('front.layouts.master')
@section('content')
    @if (session()->has('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="container mx-auto text-center mt-5 pt-5">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTgyobPWtA8sK4FUdJ7v2mVN1k1XYUwsy1q8A&usqp=CAU"
                class="img-fluid">
            <h2>Your payment has been processed</h2>
            <a class="btn btn-info" href="/">Back </a>
        </div>
    @endif
    @if (Session::has('data'))
        {{-- @dd(Session::get('data')); --}}
        <div class="container tex-center mx-auto">
            <form action="/pay" method="POST" class="text-center mx-auto mt-5">
                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_evEOCCEcbjwPij"
                    data-amount="{{ Session::get('data.amount') }}" data-currency="INR"
                    data-order_id="{{ Session::get('data.order_id') }}" data-buttontext="Pay with Razorpay" data-name="Ecommerce"
                    data-description="{{ Session::get('data.description') }}" data-theme.color="#F37254"></script>
                <input type="hidden" custom="Hidden Element" name="hidden">
            </form>
        </div>
    @endif
@endsection
