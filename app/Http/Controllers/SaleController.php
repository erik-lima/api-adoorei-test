<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return Sale::all();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $products = $request->get('products');

            $totalItems = 0;
            $totalValue = 0;
            $productsData = [];

            foreach ($products as $currentProduct) {
                $totalItems += $currentProduct['amount'];
                $productData = Product::find($currentProduct['id']);

                $totalValue += $productData->price * $currentProduct['amount'];

                $productsData[] = [
                    'product_id' => $productData->id,
                    'amount' => $currentProduct['amount'],
                    'price' => $productData->price,
                    'total' => $currentProduct['amount'] * $productData->price
                ];
            }

            $salesdata = [
                'total_items' => $totalItems,
                'total_value' => $totalValue,
                'status' => 1
            ];

            $sale = Sale::create($salesdata);
            $sale->products()->attach($productsData);

            return response()->json($sale->with('products')->get());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        try {
            return response()->json(Sale::where('id', $sale->id)->with('products')->get()->first());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $products = $request->get('products');
        $saleProducts = $sale->products()->get()->toArray();

        $totalItems = 0;
        $totalValue = 0;
        $productsData = [];
        $skipId = [];

        foreach ($saleProducts as $oldProduct) {
            $foundProduct = array_search($oldProduct['id'], array_column($products, 'id'));
            $extraItem = 0;
            if ($foundProduct !== false) {
                $extraItem = $products[$foundProduct]['amount'];
                $skipId []= $products[$foundProduct]['id'];
            }

            $amount = $oldProduct['pivot']['amount'] + $extraItem;

            $totalItems += $amount;
            $totalValue += $amount * $oldProduct['pivot']['price'];

            $productsData[] = [
                'product_id' => $oldProduct['id'],
                'amount' => $amount,
                'price' => $oldProduct['pivot']['price'],
                'total' => $amount * $oldProduct['pivot']['price']
            ];
        }

        foreach ($products as $currentProduct) {
            if (!in_array($currentProduct['id'], $skipId)) {
                $totalItems += $currentProduct['amount'];
                $productData = Product::find($currentProduct['id']);
    
                $totalValue += $productData->price * $currentProduct['amount'];
    
                $productsData[] = [
                    'product_id' => $productData->id,
                    'amount' => $currentProduct['amount'],
                    'price' => $productData->price,
                    'total' => $currentProduct['amount'] * $productData->price
                ];
            }
        }

        $salesdata = [
            'total_items' => $totalItems,
            'total_value' => $totalValue,
        ];

        $sale->update($salesdata);
        $sale->products()->sync($productsData);

        return response()->json($sale);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function cancel(Sale $sale)
    {
        $sale->update(['status' => 3]);
        return response()->json($sale);
    }
}
