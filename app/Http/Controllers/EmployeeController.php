<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados=Employee::with('department', 'roles')->orderBy('id', 'desc')->paginate(5);
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos=Department::select('nombre', 'id')->orderBy('nombre')->get();
        $roles=Role::select('nombre', 'id')->orderBy('nombre')->get();
        return view('empleados.nuevo', compact('departamentos', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(self::misValidaciones());
        // Guardamos el empleado
        $empleadoNuevo=Employee::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'activo'=>$request->activo,
            'department_id'=>$request->department_id
        ]);
        //Le asigno a emnpleadoNuevo los roles
        $empleadoNuevo->roles()->attach($request->roles);
        return redirect()->route('employees.index')->with('mensaje', 'Empleado Guardado');

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departamentos=Department::select('nombre', 'id')->orderBy('nombre')->get();
        $roles=Role::select('nombre', 'id')->orderBy('nombre')->get();
        //$arrayConRolesEmpleado=$employee->roles->pluck('id')->toArray();
        $arrayConRolesEmpleado=$employee->getArrayIdRoles();
        return view('empleados.editar', compact('employee', 'departamentos', 'roles', 'arrayConRolesEmpleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate(self::misValidaciones($employee->id));
        $employee->update([
            'username'=>$request->username,
            'email'=>$request->email,
            'activo'=>$request->activo,
            'department_id'=>$request->department_id
        ]);
        // Una vez actualizado el empleado actualizamos sus roles en la table empleados_roles
        $employee->roles()->sync($request->roles);
        return redirect()->route('employees.index')->with('mensaje', 'Empleado Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();        
        return redirect()->route('employees.index')->with('mensaje', 'Empleado Borrado');
    }

    private static function misValidaciones(?int $id=null): array{
        return [
            'username'=>['required', 'string', 'min:4', 'max:40', 'unique:employees,username,'.$id],
            'email'=>['required', 'email', 'unique:employees,email,'.$id],
            'activo'=>['required', 'in:Si,No'],
            'department_id'=>['required', 'exists:departments,id'],
            'roles'=>['required', 'array', 'exists:roles,id']
        ];
    }
}
