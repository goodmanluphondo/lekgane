<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HistoryController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('History', ['title' => 'Sales History']);
    }
}
