<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Order\CreateOrderAction;

class OrderController extends Controller
{
    protected $createOrderAction;

    public function __construct(CreateOrderAction $createOrderAction)
    {
        $this->createOrderAction = $createOrderAction;
    }

    public function createOrder(Request $request) {
        return $this->createOrderAction->execute($request);
    }
}
