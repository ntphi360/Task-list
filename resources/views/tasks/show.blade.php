@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link">← Go back to the task list!</a>
  </div>
  <p class="mb-4 text-slate-700">{{ $task->description }}</p>

  @if ($task->long_description)
  <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
  @endif

  <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated
    {{ $task->updated_at->diffForHumans() }}
  </p>

  <div class="mb-4">
    @if ($task->completed)
      <span class="font-medium text-green-500">Completed</span>
    @else
      <span class="font-medium text-red-500">Not completed</span>
    @endif
  </div>

  <div class="flex ">
    <div class="flex gap-2">
      <a href="{{route('tasks.edit',['task' => $task->id])}}" 
        class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        Edit
      </a>
    </div>
  
   
      <form method="POST" action="{{ route('tasks.toggleComplete',['task' => $task->id])}}">
        @csrf
        @method('PUT')
        <button type="submit" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
          {{ $task->completed ? 'Mark Incomplete' : 'Mark Complete' }}
        </button>
      </form>
    
      <form method="POST" action="{{ route('tasks.destroy',['task' => $task->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2""=>Delete</button>
      </form>
   
  </div>
  
  

@endsection

