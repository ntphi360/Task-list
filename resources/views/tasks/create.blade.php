@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
  <form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <div>
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="{{ old('title') }}">
      @error('title')
        <p>{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="description">Description</label>
      <textarea name="description" id="description">{{ old('description') }}</textarea>
      @error('description')
        <p>{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="long_description">Long Description</label>
      <textarea name="long_description" id="long_description">{{ old('long_description') }}</textarea>
      @error('long_description')
        <p>{{ $message }}</p>
      @enderror
    </div>

    <button type="submit">Add Task</button>
  </form>

@endsection