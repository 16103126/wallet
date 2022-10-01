@extends('admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit withdraw method
        </div>
        <div class="card-body">
            <form action="{{route('admin.withdraw.method.update', $data->id)}}" method="POST">
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
                    <label for="method">Method name</label>
                    <input type="text" name="method" class="form-control" value="{{ $data->method }}">
                </div>
                <div class="form-group">
                    <label for="status">Select status</label>
                    <select name="status" id="status" class="form-control">
                        <option>Select status</option>
                        <option value="1" {{ ($data->status == 1) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ ($data->status == 0) ? 'selected' : '' }}>Deactive</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection