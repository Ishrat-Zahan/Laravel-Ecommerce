<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purches;
use App\Models\PurchesDetails;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $purches = Purches::with(['supplier', 'purchesdetails'])->get();



        return view('admin.purches.index', ['purches' => $purches]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = Supplier::all();

        return view('admin.purches.create', ['supplier' => $supplier]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $supplier_id = $request->input('supplier_id');
        $total = $request->input('grandtotal');


        $purchesC = Purches::create([
            'supplier_id' => $supplier_id,
            'total' => $total,
        ]);

        //...... purches_details........

        if ($purchesC) {
            $purches = $request->input('purches', []);

            $details = [];

            foreach ($purches as $row) {
                $product_id = $row['product_id'];
                $qty = $row['qty'];


                $details[] = [
                    'purches_id' => $purchesC->id,
                    'product_id' => $product_id,
                    'quantity' => $qty,
                ];
            }

            PurchesDetails::insert($details);


            //  ...........Stock...............

            foreach ($details as $detail) {
                $product = Product::find($detail['product_id']);
                if ($product) {
                    $product->total_quantity += $detail['quantity'];
                    $product->save();
                }
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Order Created successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($purchesId)
    {
        
        $purches = Purches::with('supplier', 'purchesdetails.product')->find($purchesId);
    
        if (!$purches) {
            return response()->json([
                'status' => 'error',
                'message' => 'Purches not found',
            ], 404);
        }
    
        // dd($purches);
    
        return view('admin.purches.show', ['purches' => $purches]);
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purches $purches)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purches $purches)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purches $purches)
    {
        //
    }

    public function searchr(Request $request)
    {
        if ($request->has('term')) {
            $term = $request->input('term');
            $products = Product::where('name', 'LIKE', '%' . $term . '%')
                ->select('id', 'name', 'total_quantity', 'selling_price')
                ->get();

            $return_arr = [];
            foreach ($products as $product) {
                $return_arr[] = [
                    'id' => $product->id,
                    'label' => $product->name,
                    'value' => $product->name,
                    'quantity' => $product->total_quantity,
                    'price' => $product->selling_price,
                ];
            }

            return response()->json($return_arr);
        }
    }
}
