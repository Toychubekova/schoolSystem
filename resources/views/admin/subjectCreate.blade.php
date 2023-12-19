<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Schedule') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="info-container">
                        <form action="{{ route('schedule.create') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="info-row">
                                <label class="info-label" for="subject-id">Subject:</label>
                                <select name="subject_id" id="subject-id" class="form-control">
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="teacher-id">Teacher:</label>
                                <select name="teacher_id" id="teacher-id" class="form-control">
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="student-id">Student:</label>
                                <select name="student_id" id="student-id" class="form-control">
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="date">Date:</label>
                                <input class="form-control" type="date" name="date" id="date">
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="start-time">Start Time:</label>
                                <input class="form-control" type="time" name="start_time" id="start-time">
                            </div>
                            <div class="info-row">
                                <label class="info-label" for="end-time">End Time:</label>
                                <input class="form-control" type="time" name="end_time" id="end-time">
                            </div>

                            <!-- Добавьте другие поля для расписания, если нужно -->

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
        /* Стили для формы */
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
