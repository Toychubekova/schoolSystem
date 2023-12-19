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
        <div class="new-news-button">
            <a href="{{ route('news.store') }}" class="btn btn-primary">Create New News</a>
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
                    <th>Title</th>
                    <th>Content</th>
                    <th>Student</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $new)
                    <tr>
                        <td>{{ $new->id }}</td>
                        <td>{{ $new->title }}</td>
                        <td>{{ $new->content }}</td>
                        <td>{{ $new->student->user->name }}</td>
                        <td>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
