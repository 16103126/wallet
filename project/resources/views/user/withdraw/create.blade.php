@push('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
@endpush

@extends('user.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Withdraw</h5>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('user.withdraw.store') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
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
                    <label for="method">Select method</label>
                    <select name="method" id="method" class="form-control">
                        <option>Select method</option>
                        @foreach ($methods as $method)
                        <option value="{{ $method->id }}">{{ $method->method }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" placeholder="Enter amount" class="form-control">
                    <small class="text-danger">[ you can withdraw minimum ${{$gsetting->withdraw_min_amount}} and Maximum ${{$gsetting->withdraw_max_amount}}. Transfer charge is {{$gsetting->withdraw_charge}}%. ]</small>
                </div>
                <button type="submit" class="btn btn-primary float-center">Submit</button>
            </form>
        </div>
    </div>
@endsection

