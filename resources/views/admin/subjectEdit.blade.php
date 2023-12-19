<x-app-layout>
    <style>
       <style>
        /* Styles for the form */
        .info-container {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* Background color for the container */
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
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="info-container">
                        <div class="info-row">
                            <h2 class="info-activity">Редактирование предмета</h2>
                        </div>
                        <form action="{{ route('subject.update', $subject) }}" method="POST" class="form-horizontal">
                            @csrf
                            @method('PATCH')
                            <div class="info-row">
                                <label class="info-label" for="subject-name">Название предмета</label>
                                <input class="form-control" type="text" name="name" id="subject-name" value="{{ $subject->name }}">
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="subject-teacher_id">Учитель:</label>
                                <select name="teacher_id" id="subject-teacher_id" class="form-control">
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->teacher_id }}">{{ $teacher->teacher_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Другие поля предмета, если нужно... -->
                            <div class="form-group" style="margin: 25px 0 0 10px;">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-submit">
                                        <i class="fa fa-plus"></i> Сохранить
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
