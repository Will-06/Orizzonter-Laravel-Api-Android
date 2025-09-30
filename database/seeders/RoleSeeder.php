<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        DB::table('roles')->insert([
            ['name' => 'super_admin', 'display_name' => 'Super Administrador'],
            ['name' => 'admin', 'display_name' => 'Administrador'],
            ['name' => 'cliente', 'display_name' => 'Cliente'],
        ]);
    }
}
