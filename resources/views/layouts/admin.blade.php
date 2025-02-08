<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Admin Navbar -->
    <nav class="navbar navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="{{ route('admin.index') }}">Admin Panel</a>
        <div class="d-flex">
            {{-- <a href="{{ route('views.homepage') }}" class="btn btn-light me-2">Visit Site</a> --}}
            <form action="" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar py-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.index') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products.index') }}">Manage Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.categories.index') }}">Manage Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">Manage Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.orders.index') }}">Manage Orders</a>
                    </li>
                </ul>
            </nav>
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>


 {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}"> --}}

{{--
    <aside class="sidebar">
            <div class="sidebar-header">

            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                    <li><a href="{{ route('admin.products.index') }}">Products</a></li>
                    <li><a href="{{ route('admin.orders.index') }}">Orders</a></li>
                    <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                </ul>
            </nav>
        </aside> --}}
