<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>Task List App</title>
</head>
<body>
  <div class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-2">@yield('title')</h1>
    @if(session()->has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50">
      <span class="font-medium">{{session('success')}}</span>
    </div>
    @endif
    @yield('content')
  </div>
</body>
</html>

