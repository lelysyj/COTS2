<?php 

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $req)
    {
        $q = $req->query('keyword');
        $products = Product::when($q, fn($b) => $b->where('name','like',"%{$q}%"))
            ->orderBy('id','desc')->paginate(10);
        return view('products.index', compact('products','q'));
    }

    public function create(){ return view('products.create'); }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required|unique:products,name|min:3',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Product::create($data);
        return redirect()->route('products.index')->with('success','Product created.');
    }

    public function show(Product $product){ return view('products.show', compact('product')); }

    public function edit(Product $product){ return view('products.edit', compact('product')); }

    public function update(Request $r, Product $product)
    {
        $data = $r->validate([
            'name' => 'required|min:3|unique:products,name,'.$product->id,
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);
        $product->update($data);
        return redirect()->route('products.index')->with('success','Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted.');
    }
}