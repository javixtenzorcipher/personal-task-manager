<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="page">

    <div class="container">

        <!-- HEADER -->

        <div class="header">

            <div>
                <h1>Personal Task Manager</h1>

                <p>
                    Stay organized and keep track of your work.
                </p>
            </div>

            <a href="/tasks/create" class="button">
                + Add Task
            </a>

        </div>


        <!-- STATISTICS -->

        <div class="stats">

            <div class="stat-card">

                <span class="stat-number">
                    {{ $tasks->count() }}
                </span>

                <span class="stat-label">
                    Total Tasks
                </span>

            </div>


            <div class="stat-card">

                <span class="stat-number">
                    {{ $tasks->where('status', 'Pending')->count() }}
                </span>

                <span class="stat-label">
                    Pending
                </span>

            </div>


            <div class="stat-card">

                <span class="stat-number">
                    {{ $tasks->where('status', 'Completed')->count() }}
                </span>

                <span class="stat-label">
                    Completed
                </span>

            </div>

        </div>


        <!-- TASK SECTION -->

        <div class="section-header">

            <h2>My Tasks</h2>

        </div>


        @if ($tasks->count() > 0)

            @foreach ($tasks as $task)

                <div class="card task-card">

                    <div class="task-info">

                        <div class="task-title-row">

                            <h3>
                                {{ $task->task_name }}
                            </h3>


                            @if ($task->status == 'Completed')

                                <span class="status completed">
                                    Completed
                                </span>

                            @else

                                <span class="status pending">
                                    Pending
                                </span>

                            @endif

                        </div>


                        <p class="task-description">
                            {{ $task->description }}
                        </p>


                        <p class="task-date">
                            Due {{ date('F j, Y', strtotime($task->due_date)) }}
                        </p>

                    </div>


                    <!-- ACTION BUTTONS -->

                    <div class="actions">

                        <a
                            href="/tasks/{{ $task->id }}/edit"
                            class="button edit-button"
                        >
                            Edit
                        </a>


                        <form
                            method="POST"
                            action="/tasks/{{ $task->id }}"

                            data-confirm="true"

                            data-confirm-title="Delete Task?"

                            data-confirm-message="Are you sure you want to delete '{{ $task->task_name }}'? This action cannot be undone."

                            data-confirm-button="Delete Task"

                            data-confirm-type="delete"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="button delete-button"
                            >
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach


        @else

            <!-- EMPTY STATE -->

            <div class="card empty">

                <h2>
                    No tasks yet
                </h2>

                <p>
                    Your task list is empty.
                    Create your first task to get started.
                </p>

                <a
                    href="/tasks/create"
                    class="button"
                >
                    + Create Your First Task
                </a>

            </div>

        @endif

    </div>

</div>


<!-- CONFIRMATION MODAL -->

<div
    class="modal"
    id="confirmationModal"
>

    <div class="modal-box">

        <h2 id="modalTitle">
            Confirm Action
        </h2>

        <p id="modalMessage">
            Are you sure?
        </p>


        <div class="modal-actions">

            <button
                type="button"
                class="button modal-cancel"
                id="modalCancel"
            >
                Cancel
            </button>


            <button
                type="button"
                class="button"
                id="modalConfirm"
            >
                Confirm
            </button>

        </div>

    </div>

</div>


<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>