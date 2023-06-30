<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/"><i class="bi bi-house"></i> BP3MI</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
        <form action="/logout" method="post">
            @csrf
        <li><button type="submit" class="nav-link px-3 py-2 bg-danger"><i class="bi bi-door-open-fill"></i> Logout</button></li>
        </form>
        </div>
    </div>
    </header>