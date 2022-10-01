@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Withdraw Request</h5>
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
                     <th>method</th>
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
                            <p class="badge bg-success">Complete</p>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
</div>
@endsection