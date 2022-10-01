@extends('user.master')

@section('content')
    <div class="card">
        <div class="card-header">
           <a href="{{route('user.withdraw.create')}}" class="btn btn-success">Withdraw</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>S.l</th>
                        <th>Name</th>
                        <th>Trxid</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Charge</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($withdraws as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->transaction_id }}</td>
                            <td>{{ $data->amount }}</td>
                            <td>{{ $data->method }}</td>
                            <td>{{ $data->charge }}</td>
                            <td>
                                @if($data->status == 0)
                                    <p class="badge bg-info text-dark">Pending</p>
                                    @else
                                    <p class="badge bg-success">Complete</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection