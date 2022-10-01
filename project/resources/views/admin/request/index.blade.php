@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Money Request List</h5>
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
                    <th>Sender name</th>
                    <th>Receiver name</th>
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
                        <td>{{ DB::table('users')->where('id', $data->sender_id)->first()->name }}</td>
                        <td>{{ DB::table('users')->where('id', $data->receiver_id)->first()->name }}</td>
                        {{-- <td>{{ $data->transaction_id }}</td> --}}
                        <td>{{ $data->amount }}</td>
                        <td>
                            @if($data->status == 1)
                            <p>complete</p>
                            @else
                            <p>pending</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.request.details', $data->id) }}" class="btn btn-danger">Details</a>
                        </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
</div>
@endsection