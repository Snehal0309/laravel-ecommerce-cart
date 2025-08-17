<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ $title ?? config('app.name') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50">
  <div class="min-h-screen flex">
    <aside class="w-64 bg-white border-r">
      <div class="p-4 font-bold text-lg">Admin</div>
      <nav class="p-2 space-y-1 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 hover:bg-gray-100">Dashboard</a>
        <a href="{{ route('admin.products.index') }}" class="block px-3 py-2 hover:bg-gray-100">Products</a>
        <a href="{{ route('admin.cart.index') }}" class="block px-3 py-2 hover:bg-gray-100">Cart (User #1)</a>
        <form action="{{ route('logout') }}" method="POST" class="px-3 py-2">
          @csrf <button class="text-red-600 hover:underline">Logout</button>
        </form>
      </nav>
    </aside>
    <main class="flex-1 p-6">
      @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 rounded">{{ session('success') }}</div>
      @endif
      @yield('content')
    </main>
  </div>
</body>
</html>
