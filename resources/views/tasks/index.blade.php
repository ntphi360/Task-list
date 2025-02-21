@extends('layouts.app')

@section('content')

<h1 class="text-red-500 text-3xl mb-3">There is of tasks</h1>
<button class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
  <a href="{{ route('tasks.create') }}">Add Task!</a>
</button>
  @forelse($tasks as $task)
    <div>
      <a href="{{ route('tasks.show', ['task' => $task->id]) }}" 
        @class(['line-through' => $task->completed])>{{ $task->title }}</a>
    </div>
  @empty
    <p>There are no tasks!</p>
  @endforelse

  @if($tasks->isNotEmpty())
    <nav>
      {{$tasks->links()}}
    </nav>
  @endif


@endsection

