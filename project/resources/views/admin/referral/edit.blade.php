@extends('admin.master')

@section('content')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Refferal Bonus</h5>
        </div>
        <div class="card-body">
            <form role="form" action="{{ route('admin.refferal.update') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
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
                    <label for="t-charge">Referrer bonus</label>
                    <input id="t-charge" type="number" name="bonus_for_referrer" value="{{ $data->bonus_for_referrer }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="d-charge">New user bonus</label>
                    <input id="d-charge" type="number" name="bonus_for_newuser" value="{{ $data->bonus_for_newuser }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary float-center">Update</button>
            </form>
            {{-- <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>S.l</th>
                        <th>Name</th>
                        <th>Bonus</th>
                    </tr>
                </thead>
            </table> --}}
        </div>
    </div>
@endsection
@endsection