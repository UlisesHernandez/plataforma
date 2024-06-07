<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nuevo Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Contenido aquí -->
                    {!! Form::open(['route' => 'usuarios.store', 'method' => 'POST', 'class' => 'mt-6 space-y-6']) !!}
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Nombre</label>
                            {!! Form::text('name', null, ['class' => 'form-input rounded-md shadow-sm mt-1 block w-full']) !!}
                        </div>

                        <div>
                            <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-200">E-mail</label>
                            {!! Form::text('email', null, ['class' => 'form-input rounded-md shadow-sm mt-1 block w-full']) !!}
                        </div>
                        <div>
                            <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Password</label>
                            {!! Form::password('password', ['class' => 'form-input rounded-md shadow-sm mt-1 block w-full']) !!}
                        </div>

                        <div>
                            <label for="confirm_password" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Confirmar Password</label>
                            {!! Form::password('confirm_password', ['class' => 'form-input rounded-md shadow-sm mt-1 block w-full']) !!}
                        </div>

                        <div>
                            <label for="roles" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Roles</label>
                            {!! Form::select('roles[]', $roles, null, ['class' => 'form-select rounded-md shadow-sm mt-1 block w-full', 'multiple']) !!}
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Guardar
                        </button>
                        <a href="{{ route('usuarios.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-4">
                            Volver
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
