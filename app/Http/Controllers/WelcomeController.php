<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        try {
            $dbInfo = [
                'version' => DB::select('SELECT * FROM v$version')[0]->banner ?? 'No disponible',
                'connection' => 'Conectado',
                'host' => config('database.connections.oracle.host'),
                'port' => config('database.connections.oracle.port'),
                'database' => config('database.connections.oracle.database'),
                'username' => config('database.connections.oracle.username'),
            ];
        } catch (\Exception $e) {
            $dbInfo = [
                'version' => 'Error de conexión',
                'connection' => 'No conectado',
                'error' => $e->getMessage(),
                'host' => config('database.connections.oracle.host'),
                'port' => config('database.connections.oracle.port'),
                'database' => config('database.connections.oracle.database'),
                'username' => config('database.connections.oracle.username'),
            ];
        }

        return Inertia::render('Welcome', [
            'dbInfo' => $dbInfo
        ]);
    }
} 