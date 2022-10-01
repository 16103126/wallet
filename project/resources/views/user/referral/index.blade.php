@extends('user.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Referral</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <label for="">Referral link:</label>
            <input type="text" id="data" value="{{url('user/register/form?referral='.auth()->guard('user')->user()->email)}}" class="form-control">
            <br>
            <button type="button" id="copy" class="btn btn-danger">Copy</button><br>

            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>S.l</th>
                        <th>Reffered User</th>
                        <th>Bonus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $bonus->bonus_for_referrer }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>

    $(document).ready(function(){
        $("#copy").click(function(){
            $("#data").select();
        document.execCommand("copy"); 
        });
    });

</script>
@endpush
