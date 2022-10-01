@push('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
@endpush

@extends('user.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Money Transfer</h5>
        </div>
        <div class="card-body">
            <form action="{{route('user.transfer.store')}}" method="POST">
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
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" placeholder="Enter amount" class="form-control">
                    <small class="text-danger">[ you can transfer minimum ${{$gsetting->transfer_min_amount}} and Maximum ${{$gsetting->transfer_max_amount}}. Transfer charge is {{$gsetting->transfer_charge}}%. ]</small>
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