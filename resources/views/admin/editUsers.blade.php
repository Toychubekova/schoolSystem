<x-app-layout>
    <style>
        /* Styles for the form */
        .info-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .info-row {
            margin-bottom: 15px;
        }

        .info-label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-submit {
            background-color: #3490dc;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #2779bd;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="info-container">
                        <div class="info-row">
                            <h2 class="info-activity">Данные пользователя</h2>
                        </div>
                        <form action="{{ route('user.update',$user) }}" method="POST" class="form-horizontal">
                            @csrf
                            @method('PATCH')
                            <div class="info-row">
                                <label class="info-label" for="user-name">ФИО</label>
                                <input class="form-control" type="text" name="name" id="user-name" value="{{ $user->name }}">
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="user-email">Электронная почта:</label>
                                <input type="email" name="email" id="user-email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="info-row">
                                <label class="info-label">Пароль:</label>
                                <input type="password" name="password" id="user-password" class="form-control">
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="user-gender">Gender:</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="man" @if ($user->gender === 'man') selected @endif>Мужской</option>
                                    <option value="woman" @if ($user->gender === 'woman') selected @endif>Женский</option>
                                </select>
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="user-code">Address:</label>
                                <input type="text" name="adress" id="user-adress" class="form-control" value="{{ $user->adress }}">
                            </div>
                            <div class="info-row">
                                <label class="info-label">Выберите Роль:</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="student" @if ($user->role === 'student') selected @endif>Student</option>
                                    <option value="teacher" @if ($user->role === 'teacher') selected @endif>Teacher</option>
                                    <option value="admin" @if ($user->role === 'admin') selected @endif>Admin</option>
                                </select>
                            </div>
                            <div class="form-group" style="margin: 25px 0 0 10px;">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-submit">
                                        <i class="fa fa-plus"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
