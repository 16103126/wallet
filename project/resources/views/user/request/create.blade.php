@push('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
@endpush

@extends('user.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Sent Request Money</h5>
        </div>
        <div class="card-body">
            <form action="{{route('user.request.money.store')}}" method="POST">
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
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter account email" class="form-control">
                </div>
                <div class="form-group">
                    
                    <label for="amount">Amount</label><small class="text-danger"> [ Transfer charge is {{$gsetting->request_percentage_charge }}% & Fixed charge is {{$currency->sign}} {{$gsetting->request_fixed_charge * $currency->value}}. ]</small>
                    <input type="number" name="amount" placeholder="Enter amount" class="form-control">
                    <small class="text-danger">[ you can transfer minimum {{$currency->sign}} {{$gsetting->request_min_amount * $currency->value}} and Maximum {{$currency->sign}} {{$gsetting->request_max_amount * $currency->value}}. ]</small>
                </div>
                <div class="form-group">
                    <label for="details">Description</label>
                    <textarea name="details" cols="5" rows="5" placeholder="Enter description" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-center">Transfer</button>
            </form>
        </div>
    </div>
@endsection