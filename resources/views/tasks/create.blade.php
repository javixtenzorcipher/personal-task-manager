<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">

    <div class="card form-card">

        <h1>Add Task</h1>
        <p>Create a new task and set its deadline.</p>

        @if ($errors->any())
            <div class="error">
                <strong>Please fix the following:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/tasks">

            @csrf

            <div class="form-group">
                <label>Task Name</label>
                <input type="text"
                       name="task_name"
                       value="{{ old('task_name') }}"
                       placeholder="Enter task name">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description"
                          placeholder="Enter task description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label>Due Date</label>

                <input type="date"
                       name="due_date"
                       value="{{ old('due_date') }}">
            </div>

            <button type="submit" class="button">
                Save Task
            </button>

            <br>

            <a href="/tasks" class="back">
                ← Back to Tasks
            </a>

        </form>

    </div>

</div>

</body>
</html>