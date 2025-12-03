@extends('plantillas.base')
@section('titulo')
    crear empleado
@endsection
@section('cabecera')
    Crear Empleado
@endsection
@section('contenido')
    <form class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">

        <!-- Username -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="username">
                <i class="fa-solid fa-user mr-2 text-gray-500"></i> Username
            </label>
            <input id="username" name="username" type="text"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="Ingrese el username">
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="email">
                <i class="fa-solid fa-envelope mr-2 text-gray-500"></i> Email
            </label>
            <input id="email" name="email" type="email"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                placeholder="usuario@correo.com">
        </div>

        <!-- Activo (Radio inline) -->
        <div>
            <span class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fa-solid fa-check-circle mr-2 text-gray-500"></i> Activo
            </span>
            <div class="flex items-center space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="activo" value="si" class="text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Sí</span>
                </label>

                <label class="inline-flex items-center">
                    <input type="radio" name="activo" value="no" class="text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">No</span>
                </label>
            </div>
        </div>

        <!-- Departamento (Select) -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="departamento">
                <i class="fa-solid fa-building mr-2 text-gray-500"></i> Departamento
            </label>
            <select id="departamento" name="departamento"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="marketing">Marketing</option>
            </select>
        </div>

        <!-- Roles (Checkbox inline) -->
        <div>
            <span class="block text-sm font-medium text-gray-700 mb-1">
                <i class="fa-solid fa-id-card mr-2 text-gray-500"></i> Roles
            </span>
            <div class="flex items-center flex-wrap gap-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="roles[]" value="admin" class="text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Administrador</span>
                </label>

                <label class="inline-flex items-center">
                    <input type="checkbox" name="roles[]" value="editor" class="text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Editor</span>
                </label>

                <label class="inline-flex items-center">
                    <input type="checkbox" name="roles[]" value="reportes" class="text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Reportes</span>
                </label>
            </div>
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
