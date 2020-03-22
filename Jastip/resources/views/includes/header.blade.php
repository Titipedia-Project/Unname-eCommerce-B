<nav style="background-color: #65587f;" class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand text-light" href="/home">
            <img src="{{ asset('images/titipedia.png') }}" width="30" height="30" class="d-inline-block align-top"
                alt="">
            Titipedia
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="mx-2 my-auto d-inline w-100">
            <div class="input-group">
                <input type="text" class="form-control border border-right-0" placeholder="Search here...">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary border border-left-0 bg-light" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                @guest

                <li class="nav-item">
                    <a class="nav-link text-light" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/register">Register</a>
                </li>

                @else
                <li class="nav-item active">
                    <a class="nav-link text-light">Order</a>
                </li>
                <li class="nav-item dropdown">
                    

                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="photo_profile/{{Auth::user()->foto}}" class="rounded-circle" width="30" height="30" alt="logo">
                        {{ Auth::user()->name }} <span class="caret"></span>
                        
                    </a>
                   

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <a class="dropdown-item" href="/produk">Profile</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>