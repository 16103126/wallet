@extends('admin.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Request Details</h4>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <table class="table table-stripe">
            <tbody>
                <tr>
                    <td>Sender Name</td>
                    <td>{{ DB::table('users')->where('id', $details->sender_id)->first()->name }}</td>
                </tr>
                <tr>
                    <td>Receiver Name</td>
                    <td>{{ DB::table('users')->where('id', $details->receiver_id)->first()->name }}</td>
                </tr>
                <tr>
                    <td>Request Amount</td>
                    <td>{{ $details->amount }}</td>
                </tr>
                <tr>
                    <td>Fixed Charge</td>
                    <td>{{ $fixed_charge }}</td>
                </tr>
                <tr>
                    <td>Percentage Charge</td>
                    <td>{{ $percentage_charge }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        @if($details->status == 1)
                            <p>complete</p>
                        @else
                            <p>pending</p>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection