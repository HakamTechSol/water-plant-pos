<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left active">
        <a href="{{url('index')}}" class="logo">
            <img src="{{ URL::asset('/assets/img/Pure_Water-1.png')}}" alt="">
        </a>
        <a href="{{url('index')}}" class="logo-small">
            <img src="{{ URL::asset('/assets/img/logo-small.png')}}" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
        </a>
    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-img"><img src="{{ URL::asset('/assets/img/profiles/avator1.jpg')}}" alt="">
                    <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img"><img src="{{ URL::asset('/assets/img/profiles/avator1.jpg')}}" alt="">
                            <span class="status online"></span></span>
                        <div class="profilesets">
                            <h6>Name</h6>
                            <h5>Role</h5>
                        </div>
                    </div>
                    <hr class="m-0">


                    <a class="dropdown-item" href="{{ route('profile' ,['id' => session('user_id')]) }}"> <i class="me-2" data-feather="user"></i> My Profile</a>
                    <!-- <a class="dropdown-item" href="{{url('generalsettings')}}"><i class="me-2" data-feather="settings"></i>Settings</a> -->
                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="{{ route('signout') }}"><img src="{{ URL::asset('/assets/img/icons/log-out.svg')}}" class="me-2" alt="img">Logout</a>
                </div>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('profile' ,['id' => session('user_id')]) }}">My Profile</a>
            <!-- <a class="dropdown-item" href="{{url('generalsettings')}}">Settings</a> -->
            <a class="dropdown-item" href="{{ route('signout') }}">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- Header -->
