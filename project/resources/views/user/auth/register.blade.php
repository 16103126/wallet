<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <form action="{{route('user.register')}}" method="POST">
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
                    @if (session('referral'))
                    <div class="form-group">
                        <label for="name">Referral</label>
                        <input type="text" name="referral" class="form-control" value="{{session('referral')}}" disabled>
                       </div>
                    @endif
                   <div class="form-group">
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
                   <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>