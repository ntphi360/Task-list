@extends('layouts.app')

@section('content')
  @include('tasks.form._form',['task' => $task])
@endsection