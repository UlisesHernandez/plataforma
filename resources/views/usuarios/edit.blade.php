<!-- Blade con Laravel Collective.-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Contenido aquí -->
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">¡Revise los campos!</strong>
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path d="M14.348 5.652a.5.5 0 00-.707 0L10 9.293 6.36 5.652a.5.5 0 10-.707.708L9.293 10l-3.64 3.64a.5.5 0 10.707.707L10 10.707l3.64-3.64a.5.5 0 000-.708z"/>
                                </svg>
                            </button>
                        </div>
                    @endif

                    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['usuarios.update', $user->id], 'class' => 'mt-6 space-y-6']) !!}
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
                            {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-select rounded-md shadow-sm mt-1 block w-full', 'multiple']) !!}
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Guardar
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
