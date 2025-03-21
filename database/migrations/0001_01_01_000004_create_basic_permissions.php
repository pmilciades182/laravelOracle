<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Insertar permisos básicos
        $permissions = [
            // Gestión de Usuarios
            ['name' => 'Ver Usuarios', 'slug' => 'view-users'],
            ['name' => 'Crear Usuarios', 'slug' => 'create-users'],
            ['name' => 'Editar Usuarios', 'slug' => 'edit-users'],
            ['name' => 'Eliminar Usuarios', 'slug' => 'delete-users'],
            
            // Gestión de Roles
            ['name' => 'Ver Roles', 'slug' => 'view-roles'],
            ['name' => 'Crear Roles', 'slug' => 'create-roles'],
            ['name' => 'Editar Roles', 'slug' => 'edit-roles'],
            ['name' => 'Eliminar Roles', 'slug' => 'delete-roles'],
            
            // Gestión de Sucursales
            ['name' => 'Ver Sucursales', 'slug' => 'view-branches'],
            ['name' => 'Crear Sucursales', 'slug' => 'create-branches'],
            ['name' => 'Editar Sucursales', 'slug' => 'edit-branches'],
            ['name' => 'Eliminar Sucursales', 'slug' => 'delete-branches'],
            
            // WMS
            ['name' => 'Ver Inventario', 'slug' => 'view-inventory'],
            ['name' => 'Gestionar Inventario', 'slug' => 'manage-inventory'],
            ['name' => 'Ver Reportes', 'slug' => 'view-reports'],
            ['name' => 'Gestionar Órdenes', 'slug' => 'manage-orders'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission['name'],
                'slug' => $permission['slug'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Asignar todos los permisos al rol de administrador
        $adminRole = DB::table('roles')->where('slug', 'admin')->first();
        $permissions = DB::table('permissions')->get();

        foreach ($permissions as $permission) {
            DB::table('permission_role')->insert([
                'role_id' => $adminRole->id,
                'permission_id' => $permission->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Asignar rol de administrador al usuario admin
        $adminUser = DB::table('users')->where('username', 'admin')->first();
        DB::table('role_user')->insert([
            'user_id' => $adminUser->id,
            'role_id' => $adminRole->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        // No es necesario revertir esta migración ya que los permisos se eliminarán
        // cuando se eliminen las tablas en la migración anterior
    }
}; 