@extends('admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            Payment
        </div>
        <div class="card-body">
            <form action="{{route('admin.sms.store')}}" method="POST">
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
                    <label for="email_host">SMS KEY</label>
                    <input type="text" name="sms_key" class="form-control" placeholder="Enter sms key">
                </div>
                <div class="form-group">
                    <label for="email_port">SMS SECRET</label>
                    <input type="text" name="sms_secret" class="form-control" placeholder="Enter sms secret">
                </div>
                <div class="form-group">
                    <label for="email_encryption">FROM SMS</label>
                    <input type="number" name="from_sms" class="form-control" placeholder="Enter from sms">
                </div>
                <div class="form-group">
                    <label for="smtp_username">TO SMS</label>
                    <input type="number" name="to_sms" class="form-control" placeholder="Enter to sms">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection