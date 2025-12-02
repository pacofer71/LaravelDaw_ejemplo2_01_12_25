<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Becario' => '#3498DB', // azul profesional
            'Desarrollador Backend' => '#2ECC71', // verde balanceado
            'Diseñador UX/UI' => '#E67E22', // naranja suave
            'Analista de Datos' => '#9B59B6', // púrpura moderno
        ];
        foreach($roles as $nombre=>$color){
            Role::create(compact('nombre', 'color'));
        }
    }
}
