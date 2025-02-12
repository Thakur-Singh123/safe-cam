<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;
use Illuminate\Http\Request;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Charge;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    //Function for show checkout or add order
    public function checkout() {
        return view('order.checkout');
    }

    //Function for submit payment
    public function processOrder(Request $request) {
        //Validate the payment amount
        $amount = $request->amount;
        if ($amount <= 0) {
            return back()->withErrors(['error' => 'Invalid payment amount. Please enter a valid amount.']);
        }
    
        //Set Stripe API Key
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        //Convert amount to cents
        $amountInCents = $amount * 100;
    
        //Create a Customer in Stripe
        $customer = \Stripe\Customer::create([
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            'description' => 'Customer for Order Payment',
        ]);

        //Attach the Payment Source (Card Token) to the Customer
        \Stripe\Customer::createSource(
            $customer->id,
            ['source' => $request->stripeToken] 
        );

        //Create a Charge for the Customer
        $charge = Charge::create([
            'amount' => $amountInCents,
            'currency' => 'usd',
            'customer' => $customer->id,
            'description' => 'Order Payment for ' . $request->customer_name,
        ]);

        //Order save db
        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'billing_address' => $request->billing_address,
            'billing_city' => $request->billing_city,
            'billing_state' => $request->billing_state,
            'billing_zip' => $request->billing_zip,
            'shipping_address' => $request->shipping_address,
            'shipping_city' => $request->shipping_city,
            'shipping_state' => $request->shipping_state,
            'shipping_zip' => $request->shipping_zip,
            'total_amount' => $amount,
            'payment_status' => 'Paid',
            'stripe_customer_id' => $customer->id, 
        ]);

        //Send Order Confirmation Email
        // Mail::to($order->customer_email)->send(new OrderConfirmationMail($order));

        //Check if order created or not    
        if ($order) {
            Session::flash('success', 'Order placed successfully!');
            return redirect()->route('order.checkout');
        } else {
            Session::flash('errors', 'Oops! Something went wrong while creating the order.');
        }
    }
    
    //Function for generate pdf file
    public function generate_pdF($id) {
        //Get order detail
        $order = Order::find($id);
        echo "<pre>"; print_r($order->toArray());exit;
        $pdf = Pdf::loadView('order.pdf', compact('order'));
        //Get pdf folder
        $filePath = public_path('uploads/pdf/order_invoice_' . $id . '.pdf');
        //echo $filePath;exit;
        //store pdf folder
        $pdf->save($filePath);
        //Return pdf download 
        return response()->download($filePath);
    }
}

