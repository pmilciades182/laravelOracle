<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Aquí irá la lógica para mostrar el dashboard de reportes
        return view('reports.index');
    }

    public function inventory()
    {
        // Aquí irá la lógica para generar reportes de inventario
        return view('reports.inventory');
    }

    public function movements()
    {
        // Aquí irá la lógica para generar reportes de movimientos
        return view('reports.movements');
    }

    public function orders()
    {
        // Aquí irá la lógica para generar reportes de órdenes
        return view('reports.orders');
    }
} 