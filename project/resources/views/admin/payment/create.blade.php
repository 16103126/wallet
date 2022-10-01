@extends('admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            Payment
        </div>
        <div class="card-body">
            <form action="{{route('admin.payment.store')}}" method="POST">
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
                    <label for="method">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="method">Stripe key</label>
                    <input type="text" name="payment_key" class="form-control">
                </div>
                <div class="form-group">
                    <label for="method">Stripe secret</label>
                    <input type="text" name="payment_secret" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection