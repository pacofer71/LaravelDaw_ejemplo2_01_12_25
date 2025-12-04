@extends('plantillas.base')
@section('titulo')
    editar empleado
@endsection
@section('cabecera')
    Editar Empleado
@endsection
@section('contenido')
    <form class="w-1/2 mx-auto p-6 bg-white shadow-md rounded-lg space-y-6" method="POST" action="{{route('employees.store')}}">
        @csrf
        <!-- Username -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="username">
                <i class="fa-solid fa-user mr-2 text-gray-500"></i> Username
            </label>
            <input id="username" name="username" type="text" value="{{ @old('username', $employee->username) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Ingrese el username">
                <x-pintar-error nombreError="username" />
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="email">
                <i class="fa-solid fa-envelope mr-2 text-gray-500"></i> Email
            </label>
            <input id="email" name="email" type="email"  value="{{ @old('email', $employee->email) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="usuario@correo.com">
            <x-pintar-error nombreError="email" />
        </div>

        <!-- Activo (Radio inline) -->
        <div>
            <span class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fa-solid fa-check-circle mr-2 text-gray-500"></i> Activo
            </span>
            <div class="flex items-center space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="activo" value="Si" class="text-blue-600 focus:ring-blue-500" @checked(@old('activo', $employee->activo)=='Si')>
                    <span class="ml-2 text-sm text-gray-700">Sí</span>
                </label>

                <label class="inline-flex items-center">
                    <input type="radio" name="activo" value="No" class="text-blue-600 focus:ring-blue-500" @checked(@old('activo', $employee->activo)=='No')>
                    <span class="ml-2 text-sm text-gray-700">No</span>
                </label>
            </div>
            <x-pintar-error nombreError="activo" />
        </div>

        <!-- Departamento (Select) -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="departamento">
                <i class="fa-solid fa-building mr-2 text-gray-500"></i> Departamento
            </label>
            <select id="departamento" name="department_id"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="marketing">Seleccione un Departamento</option>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" @selected(@old('department_id', $employee->department->id)== $departamento->id)>{{$departamento->nombre}}</option>
                @endforeach
            </select>
            <x-pintar-error nombreError="department_id" />
        </div>

        <!-- Roles (Checkbox inline) -->
        <div>
            <span class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fa-solid fa-id-card mr-2 text-gray-500"></i> Roles
            </span>
            <div class="flex items-center flex-wrap gap-6">
                @foreach($roles as $rol)
                <label class="inline-flex items-center">
                    <input type="checkbox" name="roles[]" value="{{ $rol->id }}" class="text-blue-600 focus:ring-blue-500" @checked(in_array($rol->id, @old('roles', $arrayConRolesEmpleado)))>
                    <span class="ml-2 text-sm text-gray-700">{{$rol->nombre}}</span>
                </label>
                @endforeach
            </div>
            <x-pintar-error nombreError="roles" />
        </div>

        <!-- Botones -->
        <div class="flex justify-end space-x-4 pt-4">
            <button type="submit"
                class="px-5 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
                <i class="fa-solid fa-paper-plane mr-2"></i> Enviar
            </button>

            <a href="{{ route('employees.index')}}"
                class="px-5 py-2 bg-gray-300 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-400 transition">
                <i class="fa-solid fa-xmark mr-2"></i> Cancelar
            </a>
        </div>
    </form>
@endsection
