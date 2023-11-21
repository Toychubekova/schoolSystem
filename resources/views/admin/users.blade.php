<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <!--{{ __("You're logged in!") }} -->

                     <form action="{{ route('user.create') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="inputs">
                        <!-- Название товара -->
                        <div class="form-group">
                            <label for="user-name" class="col-sm-3 control-label">ФИО </label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="user-name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group" style="margin-left:10px;">
        <label for="user-code" class="col-sm-3 control-label">Код клиента</label>
        <div class="col-sm-6">
            <input type="text" name="code" id="user-code" class="form-control">
        </div>
    </div>

    <!-- Поле для веса товара -->
    <div class="form-group" style="margin-left:10px;">
    <label for="user-number" class="col-sm-3 control-label">Номер</label>
    <div class="col-sm-6"> +996
        <input type="number" name="number" id="user-number" class="form-control" >
    </div>
</div>
<div class="form-group" style="margin-left:10px;">
    <label for="user-email" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-6">
        <input type="email" name="email" id="user-email" class="form-control">
    </div>
</div>
<div class="form-group" style="margin:25px 0 0 10px;">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default" style="background-color: #3490dc; color: white; border: none; padding: 8px 15px; border-radius: 20px; cursor: pointer;">
                                    <i class="fa fa-plus"></i> Добавить клиента
                                </button>
                            </div>
                        </div>
</div>

                        </form>
                    <table>
                        <tr>
        <th>Имя</th>
        <th>Электронная почта</th>
        <th>Номер</th>
        <th>Код</th>
        <th>Роль</th>
        <th>Действия</th>
    </tr>
                    	@foreach($users as $user)
                    	<tr>
                    		<td>
                    			<div class="text-center sm:px-6 lg:px-8">{{ $user->name }}</div>
                    		</td>
                    		<td><div class="text-center sm:px-6 lg:px-8">{{ $user->email }}</div></td>
                            <td><div class="text-center sm:px-6 lg:px-8">+996{{ $user->number }}</div></td>
                            <!-- <td><div class="text-center sm:px-6 lg:px-8">{{ $user->code }}</div></td>
                    		<td><div class="text-center sm:px-6 lg:px-8">{{ $user->role }}</div></td> -->

                                <form method="POST" action="{{ route('users.updateRole', $user) }}">
    @csrf
    @method('PATCH')

    <td class="table-text">
                    <input type="text" name="code" value="{{ $user->code }}">
                </td>
                <td>
    <div class="form-group">
        <label for="role" :value="__('Выберите новую роль:')"/>
        <select name="role" id="role" class="form-control">
            <option value="client" @if ($user->role === 'client') selected @endif>Клиент</option>
            <option value="employee" @if ($user->role === 'employee') selected @endif>Сотрудник</option>
            <option value="admin" @if ($user->role === 'admin') selected @endif >Администратор</option>
        </select>
    </div>

        </td>
                            <td>
                                <button type="submit" class="btn btn-primary" style="background-color: #3490dc; color: white; border: none;margin-left:10px ; padding: 8px 15px; border-radius: 20px; cursor: pointer;">Сохранить</button>

    <!-- <button type="submit" class="btn btn-primary ">Сохранить</button> -->
</form>

                        </td>
                    	</tr>

                    	@endforeach
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
