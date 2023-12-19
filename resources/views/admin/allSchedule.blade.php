<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Additional styles for icon buttons */
        .btn-icon {
            padding: 0.25rem 0.5rem;
            font-size: 1rem;
            line-height: 1.5;
        }
        .btn-icon i {
            margin-right: 0.25rem;
        }
        .btn-icon.btn-red {
            color: white;
            background-color: red;
            border-color: red;
        }
        .btn-icon.btn-green {
            color: white;
            background-color: green;
            border-color: green;
        }

        /* Customize table header */
        table thead th {
            background-color: #d3d3d3; /* Grey background for table header */
        }

        /* Additional styles for placement of "Create New Schedule" button */
        .new-schedule-button {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card bg-light mt-3">
        <div class="new-schedule-button">
            <a href="{{ route('schedule.create') }}" class="btn btn-primary">Create New Schedule</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Student</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->schedule_id }}</td>
                        <td>{{ $schedule->subject_name }}</td>
                        <td>{{ $schedule->teacher_name }}</td>
                        <td>{{ $schedule->student_name }}</td>
                        <td>{{ $schedule->date }}</td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>
                            <a href="{{ route('schedule.edit', $schedule->schedule_id) }}" class="btn btn-icon btn-green">
                                <i class="bi bi-pencil-fill"></i>Edit
                            </a>
                            <form action="{{ route('schedule.destroy', $schedule->schedule_id) }}" method="POST" class="form-horizontal">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-red">
                                    <i class="bi bi-trash-fill"></i>Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
