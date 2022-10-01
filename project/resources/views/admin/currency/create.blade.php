@extends('admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            Currency create
        </div>
        <div class="card-body">
            <form action="{{route('admin.currency.store')}}" method="POST">
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
                    <label for="method">Currency Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="method">Currency Sign</label>
                    <input type="text" name="sign" class="form-control">
                </div>
                <div class="form-group">
                    <label for="method">Currency Value</label>
                    <input type="text" name="value" class="form-control">
                </div>
                
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection