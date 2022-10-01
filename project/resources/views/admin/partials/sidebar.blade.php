<ul class="menu">    

    <li class="sidebar-item {{(Request::is('admin/dashboard')) ? 'active' : ''}}">
        <a href="{{route('admin.dashboard')}}" class='sidebar-link'>
            <i data-feather="" width="20"></i> 
            <span>Dashboard</span>
        </a>
        
    </li>

    <li class="sidebar-item {{(Request::is('admin/transaction*')) ? 'active' : ''}}">
        <a href="{{route('admin.transaction.index')}}" class='sidebar-link'>
            <i data-feather="" width="20"></i> 
            <span>Transaction</span>
        </a>
    </li>

    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i data-feather="briefcase" width="20"></i> 
            <span>Request Money</span>
        </a>
        <ul class="submenu ">
            <li>
                <a href="{{ route('admin.request.index') }}">Request money</a>
            </li>
            <li>
                <a href="{{route('admin.request.setting')}}">Request setting</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item {{(Request::is('admin/deposit*')) ? 'active' : ''}}">
        <a href="{{route('admin.deposit.index')}}" class='sidebar-link'>
            <i data-feather="" width="20"></i> 
            <span>Deposit</span>
        </a>
    </li>

    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i data-feather="briefcase" width="20"></i> 
            <span>Withdraw</span>
        </a>
        <ul class="submenu ">
            <li>
                <a href="{{route('admin.withdraw.request')}}">Withdraw Request</a>
            </li>
            <li>
                <a href="{{route('admin.withdraw.complete')}}">Complete Withdraw</a>
            </li>
            <li>
                <a href="{{route('admin.withdraw.method.index')}}">Withdraw method</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i data-feather="briefcase" width="20"></i> 
            <span>General Setting</span>
        </a>
        <ul class="submenu ">
            <li>
                <a href="{{route('admin.charge.setting')}}">Charge setting</a>
            </li>
            <li>
                <a href="{{ route('admin.max.amount.setting') }}">Max amount setting</a>
            </li>
            <li>
                <a href="{{ route('admin.min.amount.setting') }}">Min amount setting</a>
            </li>
        </ul>
    </li>
    
    <li class="sidebar-item  ">
        <a href="{{route('admin.currency.index')}}" class='sidebar-link'>
            <i data-feather="layout" width="20"></i> 
            <span>Currency setting</span>
        </a>
    </li>

    <li class="sidebar-item  ">
        <a href="{{route('admin.user.list')}}" class='sidebar-link'>
            <i data-feather="layout" width="20"></i> 
            <span>User</span>
        </a>
    </li>

    <li class="sidebar-item  ">
        <a href="{{route('admin.referral.edit')}}" class='sidebar-link'>
            <i data-feather="layout" width="20"></i> 
            <span>Referral</span>
        </a>
    </li>

    <li class="sidebar-item  ">
        <a href="{{route('admin.payment.create')}}" class='sidebar-link'>
            <i data-feather="layout" width="20"></i> 
            <span>Payment</span>
        </a>
    </li>

    <li class="sidebar-item  ">
        <a href="{{route('admin.email.create')}}" class='sidebar-link'>
            <i data-feather="layout" width="20"></i> 
            <span>Mail setting</span>
        </a>
    </li>

    <li class="sidebar-item  ">
        <a href="{{route('admin.sms.create')}}" class='sidebar-link'>
            <i data-feather="layout" width="20"></i> 
            <span>Sms setting</span>
        </a>
    </li>

    <li class="sidebar-item  ">
        <a href="{{route('admin.profile.show')}}" class='sidebar-link'>
            <i data-feather="layout" width="20"></i> 
            <span>Profile setting</span>
        </a>
    </li>

    <li class="sidebar-item  ">
        <a href="{{route('admin.change.password.form')}}" class='sidebar-link'>
            <i data-feather="layout" width="20"></i> 
            <span>Change password</span>
        </a>
    </li>

    <li class="sidebar-item  ">
        <a href="{{route('admin.logout')}}" class='sidebar-link'>
            <i data-feather="layout" width="20"></i> 
            <span>Logout</span>
        </a>
    </li>

</ul>