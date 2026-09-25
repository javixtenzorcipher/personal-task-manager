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

            <h1>Edit Task</h1>

            <p>
                Update your task information and status.
            </p>


            <!-- VALIDATION ERRORS -->

            @if ($errors->any())

                <div class="error">

                    <strong>
                        Please fix the following:
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- EDIT FORM -->

            <form
                method="POST"
                action="/tasks/{{ $task->id }}"
            >

                @csrf

                @method('PUT')


                <!-- TASK NAME -->

                <div class="form-group">

                    <label for="task_name">
                        Task Name
                    </label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        value="{{ $task->task_name }}"
                        placeholder="Enter task name"
                    >

                </div>


                <!-- DESCRIPTION -->

                <div class="form-group">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Enter task description"
                    >{{ $task->description }}</textarea>

                </div>


                <!-- STATUS AND DUE DATE -->

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
                                {{ $task->status == 'Pending' ? 'selected' : '' }}
                            >
                                Pending
                            </option>

                            <option
                                value="Completed"
                                {{ $task->status == 'Completed' ? 'selected' : '' }}
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
                            value="{{ $task->due_date }}"
                        >

                    </div>

                </div>


                <!-- BUTTON -->

                <div class="form-actions">

                    <button
                        type="submit"
                        class="button"
                    >
                        Update Task
                    </button>

                </div>


                <!-- BACK -->

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