<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom">
    <div class="container-fluid">
    
        <div class="navbar-brand">
            @if(patient())
                <button @click="toggleSidebar()" class="btn btn-primary mr-2 sidebar-toggler side-button" type="button" >
                    <i class="fe-menu"></i>
                </button>
            @endif
            <img src="/images/nav-logo.png" style="width: 160px;" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
         
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link text-uppercase" data-toggle="modal" href="#findDoctors">{{ __('Find Doctors') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" data-toggle="modal" href="#findLabs">{{ __('Find Labs') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" data-toggle="modal" href="#findPharmacy">{{ __('Order Medicines') }}</a>
                </li> --}}
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary text-primary px-3 text-uppercase" href="{{ route('login') }}">{{ __('Login / SignUp') }}</a>
                    </li>
                   
                @else
                    @if(patient())

                        @include('partials._notifications')

                        <li class="nav-item dropdown user-dropdown">
                            <a id="navbarDropdown" class="nav-link d-flex align-items-center dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img style="width: 40px;height:40px;border-radius:100%;" src="{{ patient()->avatar_url }}" alt="">
                                <div class="ml-2">
                                    <span class="d-block font-weight-bold mb-0">{{ patient()->name }}</span>
                                    <span>{{ substr(patient()->email, 0, 20) }}</span>
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="/home" class="dropdown-item">
                                    <i class="fe-home mr-2"></i> Dashboard
                                </a>
                                <div class="dropdown-divider"></div>
                                {{-- <a href="/appointments" class="dropdown-item">
                                    <i class="fe-calendar mr-2"></i> My Appointments
                                </a> --}}
                                <a href="/consultations" class="dropdown-item">
                                    <i class="fe-list mr-2"></i> Prescriptions
                                </a>
                                <div class="dropdown-divider"></div>
                                {{-- <a href="/orders" class="dropdown-item">
                                    <i class="fe-grid mr-2"></i> My Orders
                                </a>   --}}
                                <a href="/shared-videos" class="dropdown-item">
                                    <i class="fe-video mr-2"></i> Shared Videos
                                </a>   
                                <div class="dropdown-divider"></div>
                                <a href="/profile" class="dropdown-item">
                                    <i class="fe-user mr-2"></i> Manage Profile
                                </a>
                                {{-- <a href="/payments/consulting" class="dropdown-item">
                                    <i class="fas fa-wallet mr-2"></i> Payment History
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fe-log-out mr-2"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary text-primary px-3 text-uppercase"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="fe-log-out mr-2"></i>{{ __('Logout') }}</a>
                    </li>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>