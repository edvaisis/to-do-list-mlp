<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="container mt-4">
    <div class="col-sm-6">
        <img src="{{ asset('logo.png') }}" alt="Logo Image">
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <form method="post" action="{{ url('task-store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" id="title" name="name" class="form-control" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Add</button>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td style="{{ $task->completed ? 'text-decoration: line-through;' : '' }}">{{ $task->name }}</td>
                        <td>
                            <div style="display: flex;">
                                @if(!$task->completed)
                                    <form method="post" action="{{ url('task-completed', $task->id) }}">
                                        @csrf
                                        @method('put')
                                        <button class="btn btn-success mr-1">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>

                                    <form method="post" action="{{ url('task-destroy', $task->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<footer>
    <div class="container" style="margin-top: 8rem">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright &copy; All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
