<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // 1. Obtener los roles que existen
        $superAdminRole = Role::where('name', 'super_admin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $clienteRole = Role::where('name', 'cliente')->first(); // <-- Corregido aquí

        // Verificar que los roles existen
        if (!$superAdminRole || !$adminRole || !$clienteRole) {
            echo "Error: Uno o más roles no se encontraron. Asegúrate de ejecutar el RoleSeeder primero.\n";
            return;
        }

        User::create([
            'name' => 'Dan',
            'email' => 'dan@gmail.com',
            // Usamos Hash::make() para asegurarnos de que la contraseña esté encriptada
            'password' => Hash::make('password'),
            'role_id' => $clienteRole->id, // Asegúrate de que el role_id exista
        ]);

        // Un usuario con el rol de 'super_admin'
        User::factory()->create([
            'name' => 'Super Administrador',
            'email' => 'superadmin@example.com',
            'role_id' => $superAdminRole->id,
        ]);
        
        User::factory()->count(5)->create(['role_id' => $adminRole->id]);
        
        User::factory()->count(50)->create(['role_id' => $clienteRole->id]); // <-- Corregido aquí
        
    }
}
