@extends('admin.master')

@section('content')

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
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Minimum Transfer Amount</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.update.min.amount') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        
                        @csrf
        
                        <div class="form-group">
                            <input id="transefer_min_amount" type="number" name="transfer_min_amount" value="{{ $gsetting->transfer_min_amount }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="deposit_min_amount" type="hidden" name="deposit_min_amount" value="{{ $gsetting->deposit_min_amount }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="withdraw_min_amount" type="hidden" name="withdraw_min_amount" value="{{ $gsetting->withdraw_min_amount }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary float-center">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Minimum Deposit Amount</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.update.min.amount') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                       
                        @csrf
        
                        <div class="form-group">
                            <input id="transefer_min_amount" type="hidden" name="transfer_min_amount" value="{{ $gsetting->transfer_min_amount }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="deposit_min_amount" type="number" name="deposit_min_amount" value="{{ $gsetting->deposit_min_amount }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="withdraw_min_amount" type="hidden" name="withdraw_min_amount" value="{{ $gsetting->withdraw_min_amount }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary float-center">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Minimum Withdraw Amount</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.update.min.amount') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                       
                        @csrf
        
                        <div class="form-group">
                            <input id="transefer_min_amount" type="hidden" name="transfer_min_amount" value="{{ $gsetting->transfer_min_amount }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="deposit_min_amount" type="hidden" name="deposit_min_amount" value="{{ $gsetting->deposit_min_amount }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="withdraw_min_amount" type="number" name="withdraw_min_amount" value="{{ $gsetting->withdraw_min_amount }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary float-center">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection