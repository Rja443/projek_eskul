<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalBarang' => Product::count(),
            'totalKategori' => Category::count(),
            'totalStok' => Product::sum('stock'),
        ]);
    }
}