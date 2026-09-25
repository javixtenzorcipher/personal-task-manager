<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

<div class="page">

    <div class="container">

        <div class="card form-card">

            <div class="form-header">

                <div class="page-icon page-icon-edit" aria-hidden="true">
                    ✎
                </div>

                <div>

                    <p class="eyebrow">TASK MANAGEMENT</p>

                    <h1>Edit Task</h1>

                    <p class="form-subtitle">
                        Update your task information and status.
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

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                method="POST"
                action="/tasks/{{ $task->id }}"
            >

                @csrf

                @method('PUT')


                <div class="form-group">

                    <label for="task_name">
                        Task Name
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        value="{{ old('task_name', $task->task_name) }}"
                        placeholder="Enter task name"
                        autocomplete="off"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Enter task description"
                    >{{ old('description', $task->description) }}</textarea>

                </div>


                <div class="form-row">

                    <div class="form-group">

                        <label for="status">
                            Status
                        </label>

                        <select
                            id="status"
                            name="status"
                        >

                            <option
                                value="Pending"
                                {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}
                            >
                                Pending
                            </option>

                            <option
                                value="Completed"
                                {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}
                            >
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
                            value="{{ old('due_date', $task->due_date) }}"
                        >

                    </div>

                </div>


                <div class="form-actions">

                    <button
                        type="submit"
                        class="button button-primary"
                    >
                        Update Task
                    </button>

                    <a
                        href="/tasks"
                        class="button button-secondary"
                    >
                        Cancel
                    </a>

                </div>


                <a
                    href="/tasks"
                    class="back"
                >
                    ← Back to Tasks
                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>