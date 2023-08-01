<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Email\SendEmailAction;

class EmailController extends Controller
{
    protected $sendEmailAction;

    public function __construct(SendEmailAction $sendEmailAction)
    {
        $this->sendEmailAction = $sendEmailAction;
    }

    public function sendEmail(Request $request) {
        $this->sendEmailAction->execute($request->subject, $request->email, $request->content);

        return response()->json(['success' => 'Your message is sent!']);
    }
}
