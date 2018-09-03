<?php

namespace App\Http\Controllers;

use App\History;
use App\Products;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function buy($product)
    {
        $productObj = Products::findOrFail($product);

        if ($productObj && auth()->user()->points >= $productObj->points) {

            try {
                History::create(['product_id' => $product]);
                auth()->user()->points -= $productObj->points;
                auth()->user()->save();
                $mesaage = ['success', 'Producto comprado correctamente'];
            } catch (Exception $e) {
                Log::notice($e->getMessage());
                $mesaage = ['danger', 'Error al comprar el producto'];
            }
        }

        return back()->with('message', $mesaage);
    }
}
