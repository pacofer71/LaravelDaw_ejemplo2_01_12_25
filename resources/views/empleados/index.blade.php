@extends('plantillas.base')
@section('titulo')
    Inicio Emoleaods
@endsection
@section('cabecera')
    Lista de Empleados
@endsection
@section('contenido')
<div class="flex flex-row-reverse mb-2">
    <a href="{{ route('employees.create')}}" class="text-white font-bold p-2 rounded-xl bg-green-500 hover:bg-green-700">
        <i class="fas fa-add mr-2"></i>NUEVO
    </a>
</div>
    <table class="min-w-full border border-gray-200 shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold">Username</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Activo</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Departamento</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Roles</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @foreach($empleados as $item)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-sm text-gray-800">{{$item->username}}</td>
                <td class="px-6 py-4 text-sm text-gray-600">{{$item->email}}</td>
                <td class="px-6 py-4">
                   {{ $item->activo }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-600">
                    {{ $item->department->nombre }}
                </td>

                <td class="px-6 py-4">
                    <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                        @foreach($item->roles as $rol)
                        <li>{{$rol->nombre}}</li>
                        @endforeach
                    </ul>
                </td>

                <td class="px-6 py-4">
                    <div class="flex space-x-3">
                        <button class="px-3 py-1 text-xs bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Editar
                        </button>
                        <button class="px-3 py-1 text-xs bg-red-600 text-white rounded hover:bg-red-700 transition">
                            Eliminar
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{ $empleados->links() }}
    </div>
@endsection
@section('misalertas')
@endsection
