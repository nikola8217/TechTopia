<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Order\CreateOrderAction;
use App\Actions\Order\ChangeStatusAction;
use App\Models\Order;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    protected $createOrderAction;
    protected $changeStatusAction;

    public function __construct(CreateOrderAction $createOrderAction, ChangeStatusAction $changeStatusAction)
    {
        $this->createOrderAction = $createOrderAction;
        $this->changeStatusAction = $changeStatusAction;
    }

    public function getOrders() {
        $orders = Order::getOrders();

        return response()->json([
            'orders' => $orders 
        ]);
    }

    public function getOrdersUser($id) {
        $orders = Order::getOrdersByUser($id);

        return response()->json([
            'orders' => $orders 
        ]);
    }

    public function getOrder($id) {
        $order = Order::getOrder($id);
        
        return response()->json([
            'order' => $order 
        ]);
    }

    public function getProductsByOrder($id) {
        $products = OrderProduct::getOrderProducts($id);

        return response()->json([
            'products' => $products 
        ]);
    }

    public function createOrder(Request $request) {
        return $this->createOrderAction->execute($request);
    }

    public function changeStatus(Request $request) {
        return $this->changeStatusAction->execute($request->id, $request->status, $request->email);
    }

    public function deleteOrder($id) {
        OrderProduct::where('order_id', $id)->delete();
        Order::where('id', $id)->delete();

        return response()->json([
            'success' => 'Order is successfully deleted!',          
        ]);
    }
}
