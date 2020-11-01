<nav class="navbar navbar-expand-lg fixed-top custom-nav sticky">
    <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand logo" href="/">
            <img src="{{asset('logo/logo.png')}}" alt="Tidy Fish">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" style="color: #0A7BF6;font-family: 'Rubik', sans-serif; font-size: 1rem;">
            MENU
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{route('page.show','about_us')}}" class="nav-link font-weight-normal">About us!</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('page.show','faq')}}" class="nav-link font-weight-normal">FAQ</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('page.show','contact')}}" class="nav-link font-weight-normal">Contact</a>
                </li>
                @guest
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link text-primary">Login!</a>
                </li>
                @else
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link text-primary">Hello {{auth()->user()->name}}!</a>
                    </li>
                @endguest
                <li class="nav-item">
                    <form action="{{route('store.index')}}">
                        <button type="submit" class="btn btn-custom align-middle waves-effect waves-light btn-rounded">Shop Now</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
