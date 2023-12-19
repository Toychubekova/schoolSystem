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

        /* Customize table header and School Management System */
        table thead th {
            background-color: #d3d3d3; /* Grey background for table header */
        }

        .management-header {
            text-align: center; /* Center-align School Management System */
            background-color: #add8e6; /* Light blue background for the header */
            padding: 10px; /* Padding around the header */
            border-radius: 5px; /* Rounded corners for the header */
            margin-bottom: 20px; /* Space under the header */
        }

        /* Change color of Home link */
        .sidebar a[href="#home"] {
            background-color: #add8e6; /* Light blue color for Home */
            color: black; /* Change text color */
        }
    </style>
</head>
<body>
<div class="management-header">
    <h2>School Management System</h2> <!-- Заголовок -->
</div>
<div class="container">
    <div class="card bg-light mt-3">
        <!-- Остальной контент таблицы -->
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

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Actions</th> <!-- Заменим заголовки на "Actions" -->
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ url('userEdit', $user) }}" class="btn btn-icon btn-green">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('user.destroy',$user) }}" method="POST" class="form-horizontal">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-red">
                                    <i class="bi bi-trash-fill"></i>
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
