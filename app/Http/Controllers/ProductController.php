<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $productList = Product::all();
        return view('product.all', ['productList'=>$productList]);
    }

    public function show($id) {
        $p = Product::find($id);
        $data['product'] = $p;
        return view('product.show', $data);
    }

    public function create() {
        return view('product.form');
    }

    public function store(Request $r) {
        $p = new Product();
        $p->name = $r->name;
        $p->description = $r->description;
        $p->price = $r->price;
        $p->save();
        return redirect()->route('product.index');
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('product.form', array('product' => $product));
    }

    public function update($id, Request $r) {
        $p = Product::find($id);
        $p->name = $r->name;
        $p->description = $r->description;
        $p->price = $r->price;
        $p->save();
        return redirect()->route('product.index');
    }

    public function destroy($id) {
        $p = Product::find($id);
        $p->delete();
        return redirect()->route('product.index');
    }
}