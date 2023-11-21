
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$user->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Edit role") }}


<form method="POST" action="{{ route('users.updateRole', $user) }}">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="role" :value="__('Выберите новую роль:')"/>
        <select name="role" id="role" class="form-control">
            <option value="client" @if ($user->role === 'client') selected @endif>Клиент</option>
            <option value="employee" @if ($user->role === 'employee') selected @endif>Сотрудник</option>
            <option value="admin" @if ($user->role === 'admin') selected @endif >Администратор</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
