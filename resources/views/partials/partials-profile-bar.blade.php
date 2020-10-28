<div class="profilebar">
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/users/profile.svg')}}" class="img-fluid" alt="profile"><span class="feather icon-chevron-down live-icon"></span></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
            <div class="dropdown-item">
                <div class="profilename">
                    <h5>{{ Auth::user()->name }}</h5>
                </div>
            </div>
            <div class="userbox">
                <ul class="list-unstyled mb-0">
                    <li class="media dropdown-item">
                        <a href="{{route('home')}}" class="profile-icon">
                            <img src="{{asset('images/svg-icon/user.svg')}}" class="img-fluid" alt="user">My Profile
                        </a>
                    </li>
                    <li class="media dropdown-item">
                        <a class="profile-icon" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <img src="{{asset('images/svg-icon/logout.svg')}}" class="img-fluid" alt="logout">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
