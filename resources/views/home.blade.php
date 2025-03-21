@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Aplicaciones del Sistema</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- WMS -->
                    @can('view-inventory')
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="text-indigo-600 text-xl mb-2">
                            <i class="fas fa-warehouse"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Sistema WMS</h3>
                        <p class="text-gray-600 mb-4">Gestión de almacenes e inventario</p>
                        <a href="{{ route('wms.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Acceder
                        </a>
                    </div>
                    @endcan

                    <!-- Gestión de Usuarios -->
                    @can('view-users')
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="text-indigo-600 text-xl mb-2">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Usuarios</h3>
                        <p class="text-gray-600 mb-4">Administración de usuarios y permisos</p>
                        <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Acceder
                        </a>
                    </div>
                    @endcan

                    <!-- Sucursales -->
                    @can('view-branches')
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="text-indigo-600 text-xl mb-2">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Sucursales</h3>
                        <p class="text-gray-600 mb-4">Gestión de sucursales</p>
                        <a href="{{ route('branches.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Acceder
                        </a>
                    </div>
                    @endcan

                    <!-- Reportes -->
                    @can('view-reports')
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="text-indigo-600 text-xl mb-2">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Reportes</h3>
                        <p class="text-gray-600 mb-4">Informes y estadísticas</p>
                        <a href="{{ route('reports.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Acceder
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 