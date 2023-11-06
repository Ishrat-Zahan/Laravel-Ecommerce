<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_details;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::with(['user', 'order_details'])->get();

        return view('admin.order.index',['order' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        if (auth()->check()) {
            $userId = null;
            $userName = null;

            $user = Auth::user();

            if ($user) {
                $userId = $user->id;
                $userName = $user->name;
            }

            return view('website.cart', [ 'userId' => $userId,  'userName' => $userName,]);
          
               
                
            
        }

        return redirect()->route('login');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->input('user_id'),
            'billing_address' => $request->input('billing_address'),
            'shipping_address' => $request->input('shipping_address'),
            'total' => $request->input('total'),
            'comment' => $request->input('comment'),
            'status' => $request->input('status'),
        ]);

        if($order){
            $orders = $request->input('orders',[]);
            $details = [];
           foreach($orders as $row){
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];

            $details[] = [
                'order_id' => $order->id,
                'product_id' =>  $product_id,
                'quantity' =>  $quantity,
            ];
            
            }
          

            Order_details::insert($details);

        }

        return response()->json([
            'status' => 'success',
            'message' => 'Order Created successfully',
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {   
        $order->loadMissing(['order_details.product']);
        return view('admin.order.show',['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
// $details = [
//     ['order_id' => $order->id,
//     'product_id' =>  $product_id,
//     'quantity' =>  $quantity,
// ],
//     ['order_id' => $order->id,
//     'product_id' =>  $product_id,
//     'quantity' =>  $quantity,
// ],
//     ['order_id' => $order->id,
//     'product_id' =>  $product_id,
//     'quantity' =>  $quantity,
// ],
// ];