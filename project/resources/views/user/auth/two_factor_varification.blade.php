<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Two Factor Varification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Two Factor Varification
            </div>
            <div class="card-body">
                <form action="{{route('user.two.factor.varification.check')}}">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    @if(session('message'))
                        <div class="alert alert-danger">{{session('message')}}</div>
                    @endif
                    @csrf
                   <div class="form-group">
                    <label for="two_factor_varification_code">Enter Varification Code</label>
                    <input type="two_factor_varification_code" name="two_factor_varification_code" placeholder="Enter two factor varification code" class="form-control">
                   </div>
                   {{-- <div>Registration closes in <span id="time" data-time="{{ ((Auth::guard('user')->user()->updated_at->addMinutes(2))->subMinutes(now()->format('i')))->format('i:s') }}">{{ ((Auth::guard('user')->user()->updated_at->addMinutes(2))->subMinutes(now()->format('i')))->format('i:s')}}</span> minutes!</div> --}}
                   {{-- <div id="end" data-end= "{{(Auth::guard('user')->user()->updated_at->addMinutes(1))->format('m')}}">
                    @if((Auth::guard('user')->user()->updated_at->addMinutes(1)) > now())
                    Registration closes in <span id="time" data-time="{{ ((Auth::guard('user')->user()->updated_at->addMinutes(1))->subMinutes(now()->format('i')))->format('i:s') }}">{{ ((Auth::guard('user')->user()->updated_at->addMinutes(1))->subMinutes(now()->format('i')))->format('i:s')}}</span> minutes!
                    @else
                    Time is out
                    @endif
                </div> --}}
                   <br>
                   <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

{{-- <script>
    function startTimer(duration, display) {

        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.text(minutes + ":" + seconds);

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);

    }

    jQuery(function ($) {
        let time = $('#time').data('time');
        let endTime = $('#end').data('end');
        let times = parseInt(time);
        var start = 60 * times,
            display = $('#time');
        startTimer(start, display);
    });


</script> --}}