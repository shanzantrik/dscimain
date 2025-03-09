<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin Panel') - AISS 2025</title>

  <!-- Source Sans Pro Font -->
  <link rel="stylesheet" href="{{ asset('css/lib/source-sans-pro.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/lib/fontawesome.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/lib/adminlte.min.css') }}">
  @stack('styles')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link nav-link">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('admin.speakers.index') }}" class="brand-link">
        <span class="brand-text font-weight-light">AISS 2025 Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
            <li class="nav-item">
              <a href="{{ route('admin.speakers.index') }}"
                class="nav-link {{ request()->routeIs('admin.speakers.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>Speakers Management</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.event-days.index') }}"
                class="nav-link {{ request()->routeIs('admin.event-days.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Event Days</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <!-- Content Header -->
      <div class="content-header">
        <div class="container-fluid">
          @yield('content-header')
        </div>
      </div>

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @yield('content')
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-inline">
        Version 1.0
      </div>
      <strong>Copyright &copy; {{ date('Y') }} AISS 2025.</strong> All rights reserved.
    </footer>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('js/lib/jquery-3.7.1.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('js/lib/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('js/lib/adminlte.min.js') }}"></script>
  @stack('scripts')
</body>

</html>
