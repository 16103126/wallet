<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }

    // public function __construct()
    // {
    //     $data = PaymentGateway::whereKeyword('stripe')->first();
    //     $paydata = $data->convertAutoData();
    //     \Config::set('services.stripe.key', $paydata['key']);
    //     \Config::set('services.stripe.secret', $paydata['secret']);
    // }

    public function create()
    {
        return view('admin.payment.create');
    }

    // $stripe = Stripe::make(\Config::get('services.stripe.secret'));

    private function setEnv($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . env($key),
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }

    public function paymentConfig($input)
    {
        $this->setEnv('STRIPE_KEY',$input['payment_key']);
        $this->setEnv('STRIPE_SECRET',$input['payment_secret']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'payment_key' => 'required',
            'payment_secret' => 'required'
        ]);

        $payment = new Payment();

        $payment->name = $request->name;
        $payment->payment_key = $request->payment_key;
        $payment->payment_secret = $request->payment_secret;

        $payment->save();

        $input = $request->all();
        $this->paymentConfig($input);

        return back()->with('success', 'Payment save successfully.');
    }
}
