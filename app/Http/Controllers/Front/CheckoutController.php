<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Payment;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('front.checkout.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'address'  => 'required',
            'city'     => 'required',
            'provance' => 'required',
            'postal'   => 'required',
            'phone'    => 'required',

        ]);

        $name   = $request->input('name');
        $amount = $request->input('amount');

        $api     = new Api('rzp_test_evEOCCEcbjwPij', 'zwhSAd5IQ97tNvJ6NMOfUTSg');
        $order   = $api->order->create(array('receipt' => '123', 'amount' => $amount * 100, 'currency' => 'INR')); // Creates order
        $orderId = $order['id'];

        $user_pay = new Payment();

        $user_pay->name       = $name;
        $user_pay->amount     = $amount;
        $user_pay->payment_id = $orderId;
        $user_pay->save();

        $data = array(
            'order_id' => $orderId,
            'amount'   => $amount,
        );

        return redirect()->route('payment')->with('data', $data);

    }

    public function pay(Request $request)
    {
        $data               = $request->all();
        $user               = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        $user->payment_done = true;
        $user->razorpay_id  = $data['razorpay_payment_id'];

        $api = new Api('rzp_test_evEOCCEcbjwPij', 'zwhSAd5IQ97tNvJ6NMOfUTSg');

        try {
            $attributes = array(
                'razorpay_signature'  => $data['razorpay_signature'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_order_id'   => $data['razorpay_order_id'],
            );
            $order   = $api->utility->verifyPaymentSignature($attributes);
            $success = true;
        } catch (SignatureVerificationError $e) {

            $succes = false;
        }

        if ($success) {
            $user->save();
            Cart::instance()->destroy();
            return redirect('/payment')->with('msg', 'Success Thanks You!');
        } else {

            return redirect()->route('payment')->with('msg', 'Order Failure !');
        }
    }

    public function payment()
    {
        return view('front.payment.index');
    }
}
