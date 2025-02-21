@extends('layouts.app')

@section('title',isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
  <form action="{{ isset($task) ? route('tasks.update',['task' => $task->id]) : route('tasks.store') }}" method="POST">
    @csrf
    @isset($task)
      @method('PUT')
    @endisset
    <div class="mb-4">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="{{ old('title') }}"
      class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none
      {{ $errors->has('title') ? 'border-red-500' : '' }}">
      @error('title')
        <p class="error text-red-500">{{ $message }}</p>
      @enderror
  </div>
  

  <div class="mb-4">
    <label for="description">Description</label>
    <textarea name="description" id="description" 
        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none 
        {{ $errors->has('description') ? 'border-red-500' : '' }}">{{ old('description') }}</textarea>
    
    @error('description')
        <p class="error text-red-500">{{ $message }}</p>
    @enderror
  </div>

  <div class="mb-4">
    <label for="long_description">Description</label>
    <textarea name="long_description" id="long_description" 
        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none 
        {{ $errors->has('long_description') ? 'border-red-500' : '' }}">{{ old('long_description') }}</textarea>
    
    @error('long_description')
        <p class="error text-red-500">{{ $message }}</p>
    @enderror
  </div>


   



    <div class="flex items-center gap-2">
      <button type="submit" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ isset($task) ? 'Update task' : 'Add task' }}</button>
      <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
    </div>
  </form>

@endsection