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

        <header class="header">

            <div class="header-content">

                <p class="eyebrow">PERSONAL PRODUCTIVITY</p>

                <h1>Personal Task Manager</h1>

                <p>
                    Stay organized and keep track of your work.
                </p>

            </div>


@if ($tasks->count() > 0)

    <a
        href="/tasks/create"
        class="button button-primary add-task-button"
    >
        <span aria-hidden="true">+</span>
        Add Task
    </a>

@endif

        </header>


        <!-- STATISTICS -->

        <section class="stats" aria-label="Task statistics">

            <div class="stat-card">

                <div class="stat-icon stat-icon-total" aria-hidden="true">
                    ≡
                </div>

                <div>

                    <span class="stat-number">
                        {{ $tasks->count() }}
                    </span>

                    <span class="stat-label">
                        Total Tasks
                    </span>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon stat-icon-pending" aria-hidden="true">
                    ●
                </div>

                <div>

                    <span class="stat-number">
                        {{ $tasks->where('status', 'Pending')->count() }}
                    </span>

                    <span class="stat-label">
                        Pending
                    </span>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon stat-icon-completed" aria-hidden="true">
                    ✓
                </div>

                <div>

                    <span class="stat-number">
                        {{ $tasks->where('status', 'Completed')->count() }}
                    </span>

                    <span class="stat-label">
                        Completed
                    </span>

                </div>

            </div>

        </section>


        <!-- TASK SECTION -->

        <section class="task-section">

            <div class="section-header">

                <div>

                    <h2>My Tasks</h2>

                    @if ($search ?? false)

                        <p class="section-description">
                            Search results for
                            <strong>"{{ $search }}"</strong>
                        </p>

                    @else

                        <p class="section-description">
                            View and manage your tasks.
                        </p>

                    @endif

                </div>

            </div>


            <!-- SEARCH -->

            <form
                method="GET"
                action="/tasks"
                class="search-form"
                role="search"
            >

                <div class="search-input-wrapper">

                    <span
                        class="search-icon"
                        aria-hidden="true"
                    >
                        🔍
                    </span>

                    <input
                        type="search"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Search task name..."
                        aria-label="Search task name"
                        autocomplete="off"
                    >

                    @if ($search ?? false)

                        <a
                            href="/tasks"
                            class="clear-search"
                            aria-label="Clear search"
                        >
                            ×
                        </a>

                    @endif

                </div>


                <button
                    type="submit"
                    class="button button-primary search-button"
                >
                    Search
                </button>

            </form>


            @if ($tasks->count() > 0)

                <div class="task-results-header">

                    <span>
                        {{ $tasks->count() }}
                        {{ $tasks->count() === 1 ? 'task' : 'tasks' }}
                        found
                    </span>

                </div>


                <div class="task-list">

                    @foreach ($tasks as $task)

                        <article class="card task-card">

                            <div class="task-info">

                                <div class="task-title-row">

                                    <h3>
                                        {{ $task->task_name }}
                                    </h3>


                                    @if ($task->status == 'Completed')

                                        <span class="status completed">
                                            <span aria-hidden="true">✓</span>
                                            Completed
                                        </span>

                                    @else

                                        <span class="status pending">
                                            <span aria-hidden="true">●</span>
                                            Pending
                                        </span>

                                    @endif

                                </div>


                                @if ($task->description)

                                    <p class="task-description">
                                        {{ $task->description }}
                                    </p>

                                @else

                                    <p class="task-description task-description-empty">
                                        No description provided.
                                    </p>

                                @endif


                                <p class="task-date">

                                    <span aria-hidden="true">◷</span>

                                    Due
                                    {{ date('F j, Y', strtotime($task->due_date)) }}

                                </p>

                            </div>


                            <div class="actions">

                                <a
                                    href="/tasks/{{ $task->id }}/edit"
                                    class="button button-secondary edit-button"
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
                                        class="button button-danger delete-button"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </article>

                    @endforeach

                </div>


            @else

                @if ($search ?? false)

                    <!-- SEARCH EMPTY STATE -->

                    <div class="card empty">

                        <div
                            class="empty-icon"
                            aria-hidden="true"
                        >
                            🔍
                        </div>

                        <h2>
                            No matching tasks
                        </h2>

                        <p>
                            No tasks found for
                            <strong>"{{ $search }}"</strong>.
                        </p>

                        <a
                            href="/tasks"
                            class="button button-secondary"
                        >
                            Clear Search
                        </a>

                    </div>

                @else

                    <!-- NORMAL EMPTY STATE -->

                    <div class="card empty">

                        <div
                            class="empty-icon"
                            aria-hidden="true"
                        >
                            ✓
                        </div>

                        <h2>
                            No tasks yet
                        </h2>

                        <p>
                            Your task list is empty.
                            Create your first task to get started.
                        </p>

                        <a
                            href="/tasks/create"
                            class="button button-primary"
                        >
                            + Create Your First Task
                        </a>

                    </div>

                @endif

            @endif

        </section>

    </div>

</div>


<!-- CONFIRMATION MODAL -->

<div
    class="modal"
    id="confirmationModal"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modalTitle"
    aria-describedby="modalMessage"
>

    <div class="modal-box">

        <div class="modal-icon" aria-hidden="true">
            <span>🗑</span>
        </div>

        <h2 id="modalTitle">
            Delete Task?
        </h2>

        <p id="modalMessage">
            Are you sure?
        </p>


        <div class="modal-actions">

            <button
                type="button"
                class="button button-secondary modal-cancel"
                id="modalCancel"
            >
                Cancel
            </button>


            <button
                type="button"
                class="button button-danger"
                id="modalConfirm"
            >
                Delete Task
            </button>

        </div>

    </div>

</div>


<script src="{{ asset('js/app.js') }}"></script>

</body>

</html>