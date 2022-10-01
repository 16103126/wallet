@push('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
@endpush

@extends('user.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>User Profile Setting</h5>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('user.profile.update') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" enctype="multipart/form-data">
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
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="image">Image</label><br>
                    <img src="{{asset('assets/frontend/images/'.$user->photo)}}" alt="" width="50">
                    <input type="file" name="photo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary float-center">Update</button>
            </form>
        </div>
    </div>
@endsection

