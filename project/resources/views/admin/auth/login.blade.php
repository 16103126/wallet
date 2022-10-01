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
                    <div class="bg-success" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" class="btn btn-block btn-primary">
                        <h3 class="text-center" style="padding: 20px;">Login Form</h3>
                    </div>
                    <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; background-color: #F0F8FF;">
                        <form action="{{route('admin.login')}}" method="POST">
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
                            @if(session('message'))
                                <div class="alert alert-danger">{{session('message')}}</div>
                            @endif
                            @csrf
                           <div class="form-group">
                            <label for="email" class="text-dark">Email</label>
                            <input type="email" name="email" placeholder="Enter your email" class="form-control">
                           </div>
                           <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Enter password" class="form-control">
                           </div><br>
                           <button type="submit" class="btn btn-block btn-primary" class="btn btn-block btn-primary">Login</button>
                        </form>
                    </div>
                    <div class="card-footer bg-dark" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <p class="text-center text-light">Login with social</p>
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <a href="" class="btn btn-block btn-primary">Fbook</a>
                            </div>
                            <div class="col-md-4 mt-3">
                                <a href="" class="btn btn-block btn-info">LindIn</a>
                            </div>
                            <div class="col-md-4 mt-3">
                                <a href="" class="btn btn-block btn-success">Google</a>
                            </div>
                            <div class="col-md-4 mt-3">
                                <a href="" class="btn btn-block btn-danger">Twitter</a>
                            </div>
                        </div>
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