<h1>There is of tasks</h1>


@forelse($tasks as $task)
  <div>
    <a href="{{route('tasks.show' ,['task' => $task->id])}}">{{$task->title}}</a>
  </div>
@empty
  <p>There are no tasks!</p>
@endforelse
