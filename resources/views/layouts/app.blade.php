<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="//unpkg.com/alpinejs" defer></script>
  @vite('resources/css/app.css')
  <title>Task List App</title>
</head>
<body>
  <div class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-2">@yield('title')</h1>
    
    <div x-data="{ flash: true }">
      @if(session()->has('success'))
      <div x-show="flash" class="relative p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
        <strong class="font-bold">Success!</strong>
        <div>{{ session('success') }}</div>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" @click="flash = false"
            stroke="currentColor" class="h-6 w-6 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </span>
      </div>
      @endif
    </div>

    @yield('content')
  </div>
</body>
</html>

