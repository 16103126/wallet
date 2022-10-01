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
                    <h5>Transfer money charge</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.update.charge.setting') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        
                        @csrf
        
                        <div class="form-group">
                            <input id="t-charge" type="number" name="transfer_charge" value="{{ $gsetting->transfer_charge }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="d-charge" type="hidden" name="deposit_charge" value="{{ $gsetting->deposit_charge }}" class="form-control ">
                        </div>
                        <div class="form-group">
                            <input id="w-charge" type="hidden" name="withdraw_charge" value="{{ $gsetting->withdraw_charge }}" class="form-control ">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary float-center">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Deposit charge</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.update.charge.setting') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                       
                        @csrf
        
                        <div class="form-group">
                            <input id="t-charge" type="hidden" name="transfer_charge" value="{{ $gsetting->transfer_charge }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="d-charge" type="number" name="deposit_charge" value="{{ $gsetting->deposit_charge }}" class="form-control ">
                        </div>
                        <div class="form-group">
                            <input id="w-charge" type="hidden" name="withdraw_charge" value="{{ $gsetting->withdraw_charge }}" class="form-control ">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary float-center">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Withdraw charge</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.update.charge.setting') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        
                        @csrf
        
                        <div class="form-group">
                            <input id="t-charge" type="hidden" name="transfer_charge" value="{{ $gsetting->transfer_charge }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="d-charge" type="hidden" name="deposit_charge" value="{{ $gsetting->deposit_charge }}" class="form-control ">
                        </div>
                        <div class="form-group">
                            <input id="w-charge" type="number" name="withdraw_charge" value="{{ $gsetting->withdraw_charge }}" class="form-control ">
                        </div>
                       <div class="text-center">
                        <button type="submit" class="btn btn-primary float-center">Update</button>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection