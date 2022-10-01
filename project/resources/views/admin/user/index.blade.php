@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>User List</h5>
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
                    <th>Email</th>
                    <th>Balance</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($users as $key => $user)
                     <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->balance }}</td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
</div>
@endsection