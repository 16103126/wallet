@extends('admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.withdraw.method.create')}}" class="btn btn-success">Create withdraw method</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>S.l</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->method }}</td>
                        <td>{{ ($data->status == 1) ? 'Active' : 'Deactive' }}</td>
                        <td>
                            <a href="{{ route('admin.withdraw.method.edit', $data->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('admin.withdraw.method.delete', $data->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection