<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <form action="{{route('user.login')}}" method="POST">
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
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter your email" class="form-control">
                   </div>
                   <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter password" class="form-control">
                   </div><br>
                   <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>