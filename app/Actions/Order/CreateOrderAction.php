<?php

namespace App\Actions\Order;

use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CreateOrderAction {
    public function execute($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip' => 'required|numeric',
            'total_price' => 'required|numeric', 
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()]);

        $order = Order::createOrder($request->name, $request->email, $request->phone, $request->address, $request->city, $request->country, $request->zip, $request->total_price);

        foreach($request->products as $product) {

            $price = $product['quantity'] * $product['price'];

            OrderProduct::createOrderProduct($order->id, $product['id'], $product['quantity'], $price);
        }

        if ($request->points) {
            User::updatePoints($request->user_id);
        }

        // $subject = 'Order Received';
        // $email = $request->email;
        // $content = 'Your order is received. Than you for your trust!';

        // Mail::send([], [], function ($message) use ($subject, $email, $content) {
        //     $message->to($email)
        //     ->from('gileer404@gmail.com')
        //     ->subject($subject)
        //     ->setBody($content, 'text/html');
        // });

        return response()->json([
            'success' => 'Successfully Ordered!',
            'order' => $order          
        ]);
    }
}