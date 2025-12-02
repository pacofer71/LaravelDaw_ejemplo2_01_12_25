<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleados=Employee::factory(100)->create();
        foreach($empleados as $empleado){
            $empleado->roles()->attach(self::getIdRolesAleatorios());
        }
    }
    private static function getIdRolesAleatorios(): array{
        $todosId=Role::pluck('id')->toArray(); //[1, 2, 3, 4];
        shuffle($todosId);
        return array_splice($todosId, 0, random_int(1, count($todosId)));

    }
}
