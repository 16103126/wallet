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
                    <h5>Request Maximum Amount</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.request.setting.update') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        
                        @csrf
        
                        <div class="form-group">
                            <input id="max_amount" type="number" name="max_amount" value="{{ $data->request_max_amount }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="min_amount" type="hidden" name="min_amount" value="{{ $data->request_min_amount }}" class="form-control ">
                        </div>
                        <div class="form-group">
                            <input id="fixed_charge" type="hidden" name="fixed_charge" value="{{ $data->request_fixed_charge }}" class="form-control ">
                        </div>
                        <div class="form-group">
                            <input id="percentage_charge" type="hidden" name="percentage_charge" value="{{ $data->request_percentage_charge }}" class="form-control ">
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
                    <h5> Request Minimum Amount </h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.request.setting.update') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                       
                        @csrf
        
                        <div class="form-group">
                            <input id="max_amount" type="hidden" name="max_amount" value="{{ $data->request_max_amount }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="min_amount" type="number" name="min_amount" value="{{ $data->request_min_amount }}" class="form-control ">
                        </div>
                        <div class="form-group">
                            <input id="fixed_charge" type="hidden" name="fixed_charge" value="{{ $data->request_fixed_charge }}" class="form-control ">
                        </div>
                        <div class="form-group">
                            <input id="percentage_charge" type="hidden" name="percentage_charge" value="{{ $data->request_percentage_charge }}" class="form-control ">
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
                    <h5>Request Fixed Charge</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.request.setting.update') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        
                        @csrf
        
                        <div class="form-group">
                            <input id="max_amount" type="hidden" name="max_amount" value="{{ $data->request_max_amount }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="min_amount" type="hidden" name="min_amount" value="{{ $data->request_min_amount }}" class="form-control ">
                        </div>
                        <div class="form-group">
                            <input id="fixed_charge" type="number" name="fixed_charge" value="{{ $data->request_fixed_charge }}" class="form-control ">
                        </div>
                        <div class="form-group">
                            <input id="percentage_charge" type="hidden" name="percentage_charge" value="{{ $data->request_percentage_charge }}" class="form-control ">
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
                    <h5>Request Percentage Charge</h5>
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.request.setting.update') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        
                        @csrf
        
                        <div class="form-group">
                            <input id="max_amount" type="hidden" name="max_amount" value="{{ $data->request_max_amount }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="min_amount" type="hidden" name="min_amount" value="{{ $data->request_min_amount }}" class="form-control ">
                        </div>
                        <div class="form-group">
                            <input id="fixed_charge" type="hidden" name="fixed_charge" value="{{ $data->request_fixed_charge }}" class="form-control ">
                        </div>
                        <div class="form-group">
                            <input id="percentage_charge" type="number" name="percentage_charge" value="{{ $data->request_percentage_charge }}" class="form-control ">
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