@extends('plantillas.base')
@section('titulo')
    Inicio Roles
@endsection
@section('cabecera')
    Listado de Roles
@endsection
@section('contenido')
    <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">ID</th>
                <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">NOMBRE</th>
                <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">COLOR</th>
                <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">ACCIONES</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($roles as $item)
            <tr class="border-b hover:bg-blue-400">
                <td class="px-4 py-2">{{$item->id}}</td>
                <td class="px-4 py-2">{{$item->nombre}}</td>
                <td class="px-4 py-2">
                    <p class="px-3 py-1 rounded text-white font-medium inline-block bg-[{{ $item->color }}]">
                        {{$item->color}}
                    </p>
                </td>
                <td class="px-4 py-2">Acciones</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('misalertas')
@endsection
