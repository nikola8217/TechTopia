<?php

namespace App\Actions\Email;

use Illuminate\Support\Facades\Mail;

class SendEmailAction {
    public function execute($subject, $email, $content)
    {
        if ($subject === '') return response()->json(['error' => 'Subject field is required']);

        if ($email === '') return response()->json(['error' => 'Email field is required']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return response()->json(['error' => 'Email field is not valid']);

        if ($content === '') return response()->json(['error' => 'You must write something']);

        Mail::send([], [], function ($message) use ($subject, $email, $content) {
            $message->to('gileer404@gmail.com')
            ->from($email)
            ->subject($subject)
            ->setBody($content, 'text/html');
        });

    }
}