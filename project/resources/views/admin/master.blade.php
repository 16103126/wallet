<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/backend/vendors/chartjs/Chart.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/backend/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/backend/images/favicon.svg')}}" type="image/x-icon">
    @stack('css')
</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <h3>Dashboard</h3>
    </div>
    <div class="sidebar-menu">
        @include('admin.partials.sidebar')
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            @include('admin.partials.top-nav')
            
<div class="main-content container-fluid">
    <div class="page-title">
        {{-- <h3>Dashboard</h3> --}}
    </div>
    <section class="section">
        @yield('content')
    </section>
</div>

            @include('admin.partials.footer')

        </div>
    </div>
    <script src="{{asset('assets/backend/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/app.js')}}"></script>
    
    <script src="{{asset('assets/backend/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('assets/backend/js/main.js')}}"></script>
    
    @stack('js')
</body>
</html>
