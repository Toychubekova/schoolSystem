<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new student') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="info-container">
                        <form action="{{ route('student.create') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="info-row">
                                <label class="info-label" for="user-name">Name</label>
                                <input class="form-control" type="text" name="name" id="user-name">
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="user-email">Email:</label>
                                <input type="email" name="email" id="user-email" class="form-control">
                            </div>
                            <div class="info-row">
                                <label class="info-label">Password:</label>
                                <input type="password" name="password" id="user-password" class="form-control">
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="gender">Gender:</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="man">Мужской</option>
                                    <option value="woman">Женский</option>
                                </select>
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="user-adress">Address:</label>
                                <input type="text" name="adress" id="user-adress" class="form-control">
                            </div>
                            <input type="hidden" name="role" id="role" value="student" class="form-control">
                            <div class="form-group" style="margin: 25px 0 0 10px;">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-default btn-submit">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Styles for the form */
        .info-container {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .info-row {
            margin-bottom: 15px;
        }

        .info-label {
            font-weight: bold;
            display: block;
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
</x-app-layout>
