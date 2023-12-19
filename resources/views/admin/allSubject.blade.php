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

        /* Additional styles for placement of "Create New Subject" button */
        .new-subject-button {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card bg-light mt-3">
        <div class="new-subject-button">
            <a href="{{ route('subject.createSubject') }}" class="btn btn-primary">Create New Subject</a>
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
                    <th>Name</th>
                    <th>Teacher</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->subject_id }}</td>
                        <td>{{ $subject->subject_name }}</td>
                        <td>{{ $subject->teacher_name }}</td>
                        <td>
                            <a href="{{ route('subject.edit', $subject->subject_id) }}" class="btn btn-icon btn-green">
                                <i class="bi bi-pencil-fill"></i>Edit
                            </a>
                            <form action="{{ route('subject.destroy', $subject->subject_id) }}" method="POST" class="form-horizontal">
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
