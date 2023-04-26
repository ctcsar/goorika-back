<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function createProduct(Request $request)
    {
        $product = Products::create([
            'userId' => $request->input('userId'),
            'body' => $request->input('body'),
            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'tags' => $request->input('tags'),
            'position' => $request->input('position'),
            'active' => $request->input('active'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'eventId' => $request->input('eventId'),
        ]);
        return json_encode($product);
    }

    public function updateProduct(Request $request)
    {
        $product = Products::where('id', $request->input('id'))
            ->update([
            'userId' => $request->input('userId'),
            'body' => $request->input('body'),
            'description' => $request->input('description'),
            'title' => $request->input('title'),
            'tags' => $request->input('tags'),
            'position' => $request->input('position'),
            'active' => $request->input('active'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'eventId' => $request->input('eventId'),
        ]);
        return json_encode($product);    }

    public function getAllProducts()
    {
        return json_encode(Products::all());
    }
}
