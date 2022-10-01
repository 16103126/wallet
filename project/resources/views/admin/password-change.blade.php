@extends('admin.master')

@section('content')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Change password</h5>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('admin.password.update') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" enctype="multipart/form-data">
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
                    <label for="current_password">Current password</label>
                    <input type="password" name="current_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_password">New password</label>
                    <input type="password" name="new_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm password</label>
                    <input id="password" type="password" name="password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary float-center">Update</button>
            </form>
        </div>
    </div>
@endsection
@endsection