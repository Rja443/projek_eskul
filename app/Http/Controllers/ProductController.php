<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::with('category')
            ->when($search,function($query) use ($search){
                $query->where('name','like',"%$search%");
            })
            ->latest()
            ->paginate(5);

        return view('products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|numeric|min:0',
            'stock'=>'required|integer|min:0'
        ]);

        Product::create($request->all());

        return redirect()
                ->route('products.index')
                ->with('success','Barang berhasil ditambah');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view(
            'products.edit',
            compact('product','categories')
        );
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|numeric|min:0',
            'stock'=>'required|integer|min:0'
        ]);

        $product->update($request->all());

        return redirect()
                ->route('products.index')
                ->with('success','Barang berhasil diubah');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
                ->route('products.index')
                ->with('success','Barang berhasil dihapus');
    }
}