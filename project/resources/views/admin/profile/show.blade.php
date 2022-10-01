@extends('admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Profile setting</h5>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('admin.profile.update') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" enctype="multipart/form-data">
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
                    <input type="text" name="name" value="{{ $admin->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $admin->email }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="image">Image</label><br>
                    <img src="" alt="" id="image" width="50">
                    <img src="" alt="">
                    <input type="file" name="photo" class="form-control" id="imageUrl">
                </div>
                <button type="submit" class="btn btn-primary float-center">Update</button>
            </form>
        </div>
    </div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script>
            function imageShow(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image').attr('src',e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUrl").on('change', function () {
            imageShow(this);
        });
        </script>
@endpush