<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
    <a class="navbar-brand text-dark" href="/">BP3MI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mt-1 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('panduan') ? 'active' : '' }}" href="/panduan">Panduan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
        </li>
    </ul>
    
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome Back, {{ auth()->user()->username }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="/dashboard"><i class="bi bi-display"></i> My Dashboard</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <form action="/logout" method="post">
                        @csrf
                    <li>
                        <button type="submit" class="dropdown-item">
                    <i class="bi bi-door-open">
                    </i> Logout</button></li>
                    </form>
                </ul>
                </li>
            @else
            <li class="nav-item">
                <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            @endauth
        </ul>
    </div>
    </div>
</nav>