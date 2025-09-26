<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title') | Admin Panel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  @stack('head')
</head>
<body class="bg-gray-100 flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-gray-900 text-white min-h-screen flex flex-col">
    <div class="p-6 text-2xl font-bold border-b border-gray-700">Admin Panel</div>
    <nav class="flex-1 p-4 space-y-2">
      <a href="{{ route('admin.home') }}" class="block px-4 py-2 rounded hover:bg-gray-700">🏠 Home</a>
      <a href="{{ route('admin.pengguna') }}" class="block px-4 py-2 rounded hover:bg-gray-700">👤 Pengguna</a>
      <a href="{{ route('admin.proyek') }}" class="block px-4 py-2 rounded hover:bg-gray-700">📂 Proyek</a>
    </nav>
    
    <!-- User Info & Logout -->
    <div class="p-4 border-t border-gray-700">
      <div class="mb-2 text-sm text-gray-300">
        Selamat datang, {{ Auth::user()->nama ?? 'Admin' }}
      </div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 rounded bg-red-600 hover:bg-red-700 transition duration-300">
          🚪 Logout
        </button>
      </form>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6 overflow-auto">
    @yield('content')
  </main>

  @stack('scripts')
</body>
</html>
