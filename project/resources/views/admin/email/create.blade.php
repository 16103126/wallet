@extends('admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            Payment
        </div>
        <div class="card-body">
            <form action="{{route('admin.email.store')}}" method="POST">
                @csrf
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
                <div class="form-group">
                    <label for="email_host">SMTP HOST</label>
                    <input type="text" name="email_host" class="form-control" placeholder="Enter SMTP HOST">
                </div>
                <div class="form-group">
                    <label for="email_port">SMTP PORT</label>
                    <input type="number" name="email_port" class="form-control" placeholder="Enter SMTP PORT">
                </div>
                <div class="form-group">
                    <label for="email_encryption">Encryption</label>
                    <input type="text" name="email_encryption" class="form-control" placeholder="Enter Encryption">
                </div>
                <div class="form-group">
                    <label for="smtp_username">SMTP Username</label>
                    <input type="text" name="smtp_username" class="form-control" placeholder="Enter SMTP Username">
                </div>
                <div class="form-group">
                    <label for="smtp_password">SMTP Password</label>
                    <input type="text" name="smtp_password" class="form-control" placeholder="Enter SMTP Password">
                </div>
                <div class="form-group">
                    <label for="from_email">Form Email</label>
                    <input type="text" name="from_email" class="form-control" placeholder="Enter From Email">
                </div>
                <div class="form-group">
                    <label for="from_name">From Name</label>
                    <input type="text" name="from_name" class="form-control" placeholder="Enter From Name">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection