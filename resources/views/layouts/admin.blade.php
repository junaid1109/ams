<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Admin Panel - AMS')</title>

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- Admin CSS -->
  <style>
    :root {
      --bs-primary: #0d6efd;
      --bs-secondary: #6c757d;
      --bs-success: #198754;
      --bs-danger: #dc3545;
      --bs-warning: #ffc107;
      --bs-info: #0dcaf0;
    }

    body {
      font-family: "roboto", sans-serif;
      background-color: #f8f9fa;
      color: #333;
    }

    .admin-container {
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 250px;
      background-color: #2c3e50;
      color: white;
      position: fixed;
      height: 100vh;
      overflow-y: auto;
      padding: 20px 0;
    }

    .sidebar .logo {
      text-align: center;
      padding: 20px;
      border-bottom: 1px solid #34495e;
      font-size: 20px;
      font-weight: bold;
    }

    .sidebar-nav {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar-nav li {
      margin: 0;
    }

    .sidebar-nav a {
      display: block;
      padding: 12px 20px;
      color: #ecf0f1;
      text-decoration: none;
      border-left: 3px solid transparent;
      transition: all 0.3s;
    }

    .sidebar-nav a:hover {
      background-color: #34495e;
      border-left-color: #3498db;
      color: white;
    }

    .sidebar-nav a.active {
      background-color: #3498db;
      border-left-color: #2980b9;
      color: white;
    }

    .sidebar-nav .dropdown-menu {
      background-color: #34495e;
      padding: 0;
      border: none;
    }

    .sidebar-nav .dropdown-menu a {
      padding-left: 40px;
      font-size: 14px;
    }

    .main-content {
      margin-left: 250px;
      flex: 1;
      padding: 20px;
    }

    .topbar {
      background-color: white;
      padding: 15px 20px;
      border-bottom: 1px solid #e0e0e0;
      margin-bottom: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-radius: 4px;
    }

    .page-title {
      font-size: 24px;
      font-weight: 600;
      margin: 0;
    }

    .user-menu {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-menu a {
      padding: 8px 15px;
      border-radius: 4px;
      text-decoration: none;
      background-color: #f0f0f0;
      color: #333;
      font-size: 14px;
      transition: all 0.3s;
    }

    .user-menu a:hover {
      background-color: #dc3545;
      color: white;
    }

    .card {
      border: none;
      border-radius: 4px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .card-header {
      background-color: #f8f9fa;
      border-bottom: 1px solid #dee2e6;
      padding: 15px;
      font-weight: 600;
    }

    .btn {
      border-radius: 4px;
      padding: 8px 15px;
      font-size: 14px;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-primary {
      background-color: #0d6efd;
      color: white;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
      color: white;
    }

    .btn-danger {
      background-color: #dc3545;
      color: white;
    }

    .btn-danger:hover {
      background-color: #c82333;
      color: white;
    }

    .btn-secondary {
      background-color: #6c757d;
      color: white;
    }

    .btn-secondary:hover {
      background-color: #5a6268;
      color: white;
    }

    .table {
      background-color: white;
      margin-bottom: 0;
    }

    .table thead th {
      background-color: #f8f9fa;
      border-bottom: 2px solid #dee2e6;
      font-weight: 600;
      color: #333;
    }

    .table tbody td {
      padding: 12px;
      vertical-align: middle;
    }

    .table tbody tr:hover {
      background-color: #f8f9fa;
    }

    .badge {
      padding: 4px 8px;
      border-radius: 3px;
      font-size: 12px;
      font-weight: 600;
    }

    .badge-success {
      background-color: #198754;
      color: white;
    }

    .badge-danger {
      background-color: #dc3545;
      color: white;
    }

    .stat-card {
      background-color: white;
      padding: 20px;
      border-radius: 4px;
      border-left: 4px solid #0d6efd;
      margin-bottom: 20px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .stat-card .stat-value {
      font-size: 28px;
      font-weight: bold;
      color: #0d6efd;
    }

    .stat-card .stat-label {
      font-size: 14px;
      color: #666;
      margin-top: 5px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-control {
      border: 1px solid #ddd;
      padding: 8px 12px;
      border-radius: 4px;
      font-size: 14px;
    }

    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    label {
      font-weight: 600;
      margin-bottom: 5px;
      display: block;
      font-size: 14px;
    }

    .alert {
      border-radius: 4px;
      padding: 12px 15px;
      margin-bottom: 20px;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .alert-danger {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    .alert-warning {
      background-color: #fff3cd;
      color: #856404;
      border: 1px solid #ffeeba;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 200px;
      }

      .main-content {
        margin-left: 0;
      }

      .topbar {
        flex-direction: column;
        gap: 10px;
      }
    }
  </style>

  @stack('css')
</head>

<body>

  <div class="admin-container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="logo">
        <i class="bi bi-speedometer2"></i> Admin
      </div>

      <ul class="sidebar-nav">
        <li>
          <a href="{{ route('admin.dashboard') }}" class="@if(Route::currentRouteName() == 'admin.dashboard') active @endif">
            <i class="bi bi-speedometer2"></i> Dashboard
          </a>
        </li>

        <li>
          <a href="{{ route('admin.services.index') }}" class="@if(str_contains(Route::currentRouteName(), 'admin.services')) active @endif">
            <i class="bi bi-gear"></i> Services
          </a>
        </li>

        <li>
          <a href="{{ route('admin.portfolio.index') }}" class="@if(str_contains(Route::currentRouteName(), 'admin.portfolio')) active @endif">
            <i class="bi bi-images"></i> Portfolio
          </a>
        </li>

        <li>
          <a href="{{ route('admin.team.index') }}" class="@if(str_contains(Route::currentRouteName(), 'admin.team')) active @endif">
            <i class="bi bi-people"></i> Team
          </a>
        </li>

        <li>
          <a href="{{ route('admin.pages.index') }}" class="@if(str_contains(Route::currentRouteName(), 'admin.pages')) active @endif">
            <i class="bi bi-file-text"></i> Pages
          </a>
        </li>

        <li>
          <a href="{{ route('admin.contacts.index') }}" class="@if(str_contains(Route::currentRouteName(), 'admin.contacts')) active @endif">
            <i class="bi bi-envelope"></i> Contacts
            @php
            $unreadCount = App\Models\Contact::where('is_read', false)->count();
            @endphp
            @if($unreadCount > 0)
            <span class="badge badge-danger" style="float: right;">{{ $unreadCount }}</span>
            @endif
          </a>
        </li>

        <li>
          <a href="{{ route('admin.settings.index') }}" class="@if(Route::currentRouteName() == 'admin.settings.index') active @endif">
            <i class="bi bi-sliders"></i> Settings
          </a>
        </li>

        <li style="border-top: 1px solid #34495e; margin-top: 20px; padding-top: 20px;">
          <form method="POST" action="{{ route('logout') }}" style="padding: 0;">
            @csrf
            <button type="submit" style="background: none; border: none; color: #ecf0f1; padding: 12px 20px; width: 100%; text-align: left; cursor: pointer; transition: all 0.3s; border-left: 3px solid transparent;">
              <i class="bi bi-box-arrow-right"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="topbar">
        <h1 class="page-title">@yield('page-title', 'Admin Panel')</h1>
        <div class="user-menu">
          <span>{{ Auth::user()->name }}</span>
          <a href="{{ route('home') }}" target="_blank">View Site</a>
        </div>
      </div>

      @if ($errors->any())
      <div class="alert alert-danger">
        <h4>Please fix the following errors:</h4>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      @if (session('success'))
      <div class="alert alert-success">
        <strong>Success!</strong> {{ session('success') }}
      </div>
      @endif

      @yield('content')
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  @stack('js')

</body>

</html>
