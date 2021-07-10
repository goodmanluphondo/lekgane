<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        if($request->input('term')) {
            $product = array();
            $product = Product::query()->where('barcode', $request->input('term'))->first();

            return response()->json($product);
        }
    }
}
