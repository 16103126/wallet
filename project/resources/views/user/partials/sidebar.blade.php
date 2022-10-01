<ul class="list-group mb-3">
    
    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      <a href="{{route('user.transfer.index')}}" class="nav-link">Transfer Money</a>
    </li>

    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      <a href="{{route('user.transaction.index')}}" class="nav-link">Transaction</a>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      <a href="{{route('user.request.money.create')}}" class="nav-link">Sent Request Money</a>
    </li>

    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      <a href="{{route('user.sent.request.list')}}" class="nav-link">Sent Request List</a>
    </li>

    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      <a href="{{route('user.money.request.list')}}" class="nav-link">Money Request List</a>
    </li>

    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      <a href="{{route('user.deposit.index')}}" class="nav-link">Deposit</a>
    </li>

    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      <a href="{{route('user.withdraw.index')}}" class="nav-link">Withdraw</a>
    </li>

    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      <a href="{{route('user.referral.index')}}" class="nav-link">Referral</a>
    </li>

    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      <a href="javascript:;" class="nav-link">2-Step Varification</a>
      <div class="dropdown">
        <button class="btn btn-{{ (Auth::guard('user')->user()-> status == 0) ? 'danger' : 'success' }} dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          {{ (Auth::guard('user')->user()-> status == 0) ? 'Off' : 'On' }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="{{ route('user.two.factor.varification.on') }}">On</a></li>
          <li><a class="dropdown-item" href="{{ route('user.two.factor.varification.off') }}">Off</a></li>
        </ul>
      </div>
    </li>

    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      <a href="{{route('user.profile.show', auth()->guard('user')->user()->id)}}" class="nav-link">Profile setting</a>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      <a href="{{route('user.change.password.form')}}" class="nav-link">Change password</a>
    </li>

    {{-- <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
      {{url('user/register/form?referral='.auth()->guard('user')->user()->email)}}
    </li> --}}

    <li class="list-group-item d-flex justify-content-between lh-sm nav-item">
        <a href="{{route('user.logout')}}" class="nav-link">Logout</a>
    </li>

  </ul>