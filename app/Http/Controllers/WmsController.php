<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WmsController extends Controller
{
    public function dashboard()
    {
        // Aquí irá la lógica para mostrar el dashboard del WMS
        return view('wms.dashboard');
    }

    public function inventory()
    {
        // Aquí irá la lógica para gestionar el inventario
        return view('wms.inventory');
    }

    public function orders()
    {
        // Aquí irá la lógica para gestionar las órdenes
        return view('wms.orders');
    }

    public function movements()
    {
        // Aquí irá la lógica para gestionar los movimientos
        return view('wms.movements');
    }
} 