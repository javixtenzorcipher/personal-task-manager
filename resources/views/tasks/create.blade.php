<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Task</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="page">

    <div class="container">

        <div class="card form-card">

            <div class="form-header">
                <div class="page-icon" aria-hidden="true">
                    +
                </div>

                <div>
                    <p class="eyebrow">TASK MANAGEMENT</p>

                    <h1>Add Task</h1>

                    <p class="form-subtitle">
                        Create a new task and set its deadline.
                    </p>
                </div>
            </div>


            @if ($errors->any())

                <div class="error" role="alert">

                    <div class="error-title">
                        Please fix the following:
                    </div>

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

                    <label for="task_name">
                        Task Name
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        value="{{ old('task_name') }}"
                        placeholder="e.g. Complete project documentation"
                        autocomplete="off"
                        required
                    >

                    <span class="field-hint">
                        Give your task a clear and recognizable name.
                    </span>

                </div>


                <div class="form-group">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Describe what needs to be done..."
                    >{{ old('description') }}</textarea>

                    <span class="field-hint">
                        Add details that will help you remember what to do.
                    </span>

                </div>


                <div class="form-row">

                    <div class="form-group">

                        <label for="status">
                            Status
                        </label>

                        <select id="status" name="status">

                            <option value="Pending"
                                {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Completed"
                                {{ old('status') == 'Completed' ? 'selected' : '' }}>
                                Completed
                            </option>

                        </select>

                    </div>


                    <div class="form-group">

                        <label for="due_date">
                            Due Date
                        </label>

                        <input
                            type="date"
                            id="due_date"
                            name="due_date"
                            value="{{ old('due_date') }}"
                        >

                    </div>

                </div>


                <div class="form-actions">

                    <button type="submit" class="button button-primary">
                        Save Task
                    </button>

                    <a href="/tasks" class="button button-secondary">
                        Cancel
                    </a>

                </div>


                <a href="/tasks" class="back">
                    ← Back to Tasks
                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>