@extends('user.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('user.transfer.create')}}" class="btn btn-success">Transfer Money</a>
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
                        <th>Remark</th>
                        <th>Charge</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->transaction_id }}</td>
                            <td>{{ $data->amount }}</td>
                            <td>{{ $data->remark }}</td>
                            <td>{{ $data->charge }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection