<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #3b82f6, #6366f1);
    }

    .login-container {
      background: white;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
      border-radius: 16px;
      padding: 32px;
      width: 100%;
      max-width: 400px;
    }

    .login-title {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      color: #1f2937;
      margin-bottom: 24px;
    }

    .alert {
      margin-bottom: 16px;
      padding: 16px;
      border-radius: 8px;
      border-left: 4px solid;
    }

    .alert-error {
      background-color: #fef2f2;
      border-color: #ef4444;
      color: #dc2626;
    }

    .alert-success {
      background-color: #f0fdf4;
      border-color: #22c55e;
      color: #15803d;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      font-size: 14px;
      font-weight: 500;
      color: #374151;
      margin-bottom: 4px;
    }

    .form-input {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid #d1d5db;
      border-radius: 12px;
      font-size: 16px;
      transition: all 0.3s;
    }

    .form-input:focus {
      outline: none;
      border-color: #6366f1;
      box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .login-btn {
      width: 100%;
      background: #6366f1;
      color: white;
      font-weight: 600;
      padding: 12px 16px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: background-color 0.3s;
      font-size: 16px;
    }

    .login-btn:hover {
      background: #4f46e5;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <!-- Judul -->
    <h2 class="login-title">Login Akun</h2>

    <!-- Pesan Error -->
    @if ($errors->any())
      <div class="alert alert-error">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif

    <!-- Pesan Sukses -->
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <!-- Form -->
    <form action="{{ route('login.authenticate') }}" method="POST">
      @csrf
      
      <!-- Username -->
      <div class="form-group">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username"
          value="{{ old('username') }}" class="form-input" />
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password"
          class="form-input" />
      </div>

      <!-- Tombol Login -->
      <button type="submit" class="login-btn">
        Login
      </button>
    </form>
  </div>

</body>
</html>
