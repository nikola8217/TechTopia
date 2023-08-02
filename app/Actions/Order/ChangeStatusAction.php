<?php

namespace App\Actions\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class ChangeStatusAction {
    public function execute($id, $status, $email)
    {
        $newStatus = '';
        $content = '';
        $subject = '';

        switch($status) {
            case 1: 
                $newStatus = 2;
                $content = 'Your order is in preparation';
                $subject = 'Order in preparation';
                break;
            case 2:
                $newStatus = 3;
                $content = 'Your order is sent';
                $subject = 'Order sent';
                break;
            case 3:
                $newStatus = 4;
                $content = 'Your order is delivered';
                $subject = 'Order delivered';
                break;
            default:
                $newStatus = 4;
        }

        Order::changeStatus($id, $newStatus);

        Mail::send([], [], function ($message) use ($subject, $email, $content) {
            $message->to($email)
            ->from('gileer404@gmail.com')
            ->subject($subject)
            ->setBody($content, 'text/html');
        });

        return response()->json([
            'success' => 'Status updated!',          
        ]);
    }
}