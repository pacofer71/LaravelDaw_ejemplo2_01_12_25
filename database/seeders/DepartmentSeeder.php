<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            'Recursos Humanos' => '#4A90E2', // azul suave
            'Marketing' => '#F5A623', // naranja cálido
            'Finanzas' => '#7ED321', // verde equilibrado
            'Tecnología' => '#50E3C2', // turquesa claro
            'Atención al Cliente' => '#BD10E0',  // púrpura amable
        ];
        foreach($departamentos as $nombre=>$color){
            Department::create(compact('nombre', 'color'));
        }
    }
}
