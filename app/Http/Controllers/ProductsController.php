<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Создает новый товар
     * @param Request $request
     * @return false|string
     */
    public function createProduct(Request $request): string
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

    /**
     * Обновляет данные товара
     * @param Request $request
     * @return false|string
     */
    public function updateProduct(Request $request): string
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


    /**
     * Возвращает все товары
     * @return false|string
     */
    public function getAllProducts(): string
    {
        return json_encode(Products::all());
    }

    /**
     * Возвращает количество товаров
     * @return false|string
     */
    public function getProductCount(): string
    {
        return json_encode(['number of products' => Products::count()]);
    }


    public function getLimitProducts(Request $request)
    {
        return json_encode(Products::find()->count(10));
    }
}
