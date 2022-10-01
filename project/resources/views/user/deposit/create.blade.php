@push('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
@endpush

@extends('user.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Deposit</h5>
        </div>
        <div class="card-body">
            <form role="form" action="" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
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
                        <option value="stripe">Stripe</option>
                    </select>
                </div>
                <div class="row">
                    <div class="d-none" id="stripe">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="cvvNumber" class="form-label">CVV</label>
                                    <input type="number" autocomplete="off" name="cvvNumber" placeholder="ex. 311" class="form-control" id="cvvNumber" size="4" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="card_no" class="form-label">Card number</label>
                                    <input type="number" autocomplete="off" name="card_no" class="form-control" id="card_no" size="20" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="ccExpireMonth" class="form-label">Expired Month</label>
                                    <input type="number" autocomplete="off" name="ccExpireMonth" placeholder="MM" class="form-control" id="ccExpireMonth" size="4" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="ccExpireYear" class="form-label">Expired Year</label>
                                    <input type="number" autocomplete="off" name="ccExpireYear" placeholder="YY" class="form-control" id="ccExpireYear" size="4" required>
                                    <input type="hidden" value="300" autocomplete="off" name="amount" placeholder="YY" class="form-control" id="ccExpireYear" size="4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" placeholder="Enter amount" class="form-control">
                    <small class="text-danger">[ you can deposit minimum ${{$gsetting->deposit_min_amount}} and Maximum ${{$gsetting->deposit_max_amount}}. Transfer charge is {{$gsetting->deposit_charge}}%. ]</small>
                </div>
                <div class="form-group">
                    <label for="details">Description</label>
                    <textarea name="details" cols="5" rows="5" placeholder="Enter description" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-center">Submit</button>
            </form>
        </div>
    </div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script>
    $(document).ready(function(){
        $('select').on('change', function(){
            let value = $('select').val();
            
            if(value == 'stripe')
            {
                $('#stripe').removeClass('d-none');
                $('form').prop('action', '{{ route('user.deposit.stripe.store') }}');
            }
            
        });
    });
</script>
@endpush

