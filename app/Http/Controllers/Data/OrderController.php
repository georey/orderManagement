<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Data\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Orders::where('order_status_id', 1)->get();
        return view('Data.order')->with($data);
    }

    public function getOrder()
    {
        // pantalla principal con todos los clientes y formatos
    }

    public function setOrder()
    {
        // pantalla principal con todos los clientes y formatos
    }
}
