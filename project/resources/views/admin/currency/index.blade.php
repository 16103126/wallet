@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.currency.create') }}" class="btn btn-success">Create currency</a>
     </div>
     <div class="card-body">
         @if(session('success'))
             <div class="alert alert-success">{{session('success')}}</div>
         @endif
         @if(session('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
         @endif
         <table class="table table-stripe">
             <thead>
                 <tr>
                    <th>S.l</th>
                    <th>Name</th>
                    <th>Sign</th>
                    <th>Value</th>
                    <th>Default</th>
                    <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($datas as $key => $data)
                     <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->sign }}</td>
                        <td>{{ $data->value }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-{{ ($data->is_default == 1) ? 'success' : 'danger' }} dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{ ($data->is_default == 1) ? 'Default' : 'set Default' }}
                                </button>
                                @if($data->is_default == 0)
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('admin.currency.status', ['id1' => $data->id, 'id2' => 1]) }}">Default</a>
                                    </div>
                                @endif
                              </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.currency.edit', $data->id) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('admin.currency.delete', $data->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
</div>
@endsection