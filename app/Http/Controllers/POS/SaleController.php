<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SaleController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('POS/Sale', ['title' => 'New Sale', 'cart' => session('cart')]);
    }
}
