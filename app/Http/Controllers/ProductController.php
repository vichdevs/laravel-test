<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = [];
        $totalSum = "";
        if ($request->ajax()) {
            $exists = Storage::disk('local')->has('database.json');
            if ($exists) {
                $products = json_decode(file_get_contents(storage_path() . "/app/database.json"), true);
                $products = collect($products)->sortBy('created_at');
                $productCollection = collect($products)->map(function ($item) {
                    return $item['qty'] * $item['price'];
                });
                $totalSum = array_sum($productCollection->toArray());
            }
            return response()->json([
                'success' => true,
                'totalSum' => $totalSum,
                'data' => $products,
            ]);
        }
        return view('products.list');
    }

    public function store(ProductRequest $request)
    {
        $temp  = [];
        $data = $request->only(['product_name', 'qty', 'price']);
        $data['created_at'] = date('Y-m-d H:i:s');
        array_push($temp, $data);
        $exists = Storage::disk('local')->has('database.json');
        if ($exists) {
            $products = json_decode(file_get_contents(storage_path() . "/app/database.json"), true);
            if ($products) {
                array_push($products, $data);
            } else {
                $products = $temp;
            }
            Storage::disk('local')->put('database.json', json_encode($products));
        }
        return response()->json([
            'success' => true
        ]);
    }
}
