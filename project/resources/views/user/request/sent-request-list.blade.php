@extends('user.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Sent Request List</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>S.l</th>
                        <th>Time</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->created_at->diffForhumans() }}</td>
                            <td>{{ DB::table('users')->where('id', $data->receiver_id)->first()->name }}</td>
                            <td>{{ $data->amount }}</td>
                            <td>
                                @if($data->status == 0)
                                    <p class="badge bg-info text-dark">Pending</p>
                                    @else
                                    <p class="badge bg-success">Complete</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('user.request.details', $data->id) }}" class="btn btn-danger">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection