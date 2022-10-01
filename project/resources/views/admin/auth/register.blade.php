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
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="card mt-5">
                    {{-- <div class="card-header"> --}}
                        <div class="box bg-danger" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            <h1 style="padding: 10px;" class="text-light text-center">Register</h1>
                        </div>
                    {{-- </div> --}}
                    <div class="card-body">
                        <form action="{{route('admin.register')}}" method="POST">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <p><strong>Opps Something went wrong</strong></p>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
        
                            @if(session('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                            @csrf
                           <div class="form-group" >
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="Enter your name" class="form-control">
                           </div>
                           <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Enter your email" class="form-control">
                           </div>
                           <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Enter password" class="form-control">
                           </div>
                           <div class="form-group">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input type="password" name="password_confirmation" placeholder="Password confirmation" class="form-control">
                           </div><br>
                           <button type="submit" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" class="btn btn-block btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
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