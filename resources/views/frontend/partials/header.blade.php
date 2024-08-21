<header class="header-section">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0 navbar-dark">
                        <a class="site-logo site-title mr-auto" href="{{ route('root') }}"><img src="{{ asset('uploads/default/logo.png') }}" alt="site-logo"></a>
                        <div class="search-bar d-block d-lg-none">
                            <a href="#0"><i class="fas fa-search"></i></a>
                            <div class="header-top-search-area">
                                <form class="header-search-form" action="{{ route('search') }}" method="GET">
                                    <input name="keword" type="text" placeholder="Search here..." >
                                    <button class="header-search-btn" type="submit"><i class="fas fa-search"></i></button>
                                </form>
                                <form class="header-search-form" action="{{ route('search') }}" method="GET">
                                    <input name="keword" type="text" placeholder="Search here..." >
                                    <button class="header-search-btn" type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ms-auto me-auto">
                                <li class="nav-item">
                                    <a class="nav-link {{ \Request::route()->getName() == 'root' ? 'active' : '' }}" href="{{ route('root') }}" aria-current="page">Home</a>
                                </li>
                                @php
                                    $categories = App\Models\Category::where('status', true)->get();
                                    $genres = App\Models\Genre::all();
                                @endphp
                                <li>
                                    <a class="nav-link dropdown-toggle category-nav" href="#">Movies <span class="menu__icon"><i class="fas fa-caret-down"></i></span></a>
                                    <ul class="sub-menu">
                                        @forelse ($categories as $category)
                                            <li>
                                                <a href="{{ route('cate.movie', $category->slug) }}">{{ $category->name }}</a>

                                            </li>
                                        @empty
                                            <li>Not Found</li>
                                        @endforelse
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-link dropdown-toggle category-nav" href="#">Genre <span class="menu__icon"><i class="fas fa-caret-down"></i></span></a>
                                    <ul class="sub-menu">
                                        @forelse ($genres as $genre)
                                            <li>
                                                <a href="{{ route('genre.movie', $genre->slug) }}">{{ $genre->name }}</a>
                                            </li>
                                        @empty
                                            <li>Not Found</li>
                                        @endforelse
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">Live TV</a>
                                </li>
                            </ul>
                            <div class="search-bar d-none d-lg-block">
                                <a href="#0"><i class="fas fa-search"></i></a>
                                <div class="header-top-search-area">
                                    <form class="header-search-form" action="{{ route('search') }}" method="GET">
                                        <input name="keword" type="search" placeholder="Search here..." id="search">
                                        <button class="header-search-btn" type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>

                            @if (Auth::user())
                                <div class="header-right dropdown">
                                    <button class="" data-bs-toggle="dropdown" data-display="static" type="button" aria-haspopup="true" aria-expanded="false">
                                        <div class="header-user-area d-flex align-items-center justify-content-between flex-wrap">
                                            <div class="header-user-content">
                                                <span>{{ Auth::user()->name }}</span>
                                            </div>
                                            <span class="header-user-icon"><i class="las la-chevron-circle-down"></i></span>
                                        </div>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu--sm dropdown-menu-end border-0 p-0">
                                        <a class="dropdown-menu__item d-flex align-items-center px-3 py-2" href="{{ route('user.dashboard') }}">
                                            <i class="dropdown-menu__icon las la-tachometer-alt"></i>
                                            <span class="dropdown-menu__caption">Dashboard</span>
                                        </a>
                                        <a class="dropdown-menu__item d-flex align-items-center px-3 py-2" href="#">
                                            <i class="dropdown-menu__icon las la-user-circle"></i>
                                            <span class="dropdown-menu__caption">Profile Settings</span>
                                        </a>
                                        <a class="dropdown-menu__item d-flex align-items-center px-3 py-2" href="#">
                                            <i class="dropdown-menu__icon las la-key"></i>
                                            <span class="dropdown-menu__caption">Change Password</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                        <a class="dropdown-menu__item d-flex align-items-center px-3 py-2" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                                            <span class="dropdown-menu__caption">Logout</span>
                                        </a>

                                    </div>
                                </div>
                            @else
                            <div class="header-action">
                                <a class="btn--base" href="{{ route('register') }}"><i class="las la-user-circle"></i>Register</a>
                            </div>
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
