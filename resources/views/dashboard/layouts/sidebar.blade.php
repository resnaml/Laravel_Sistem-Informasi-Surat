<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                <i class="bi bi-house-door"></i>
            Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-2 {{ Request::is('dashboard/suratkeluar*') ? 'active' : '' }}" aria-current="page" href="/dashboard/suratkeluar">
                <i class="bi bi-envelope-plus"></i> Surat Keluar
            </a>
        </li>

        {{-- @can('admin') --}}
        <li class="nav-item">
            <small class="nav-link h6 text-muted" aria-current="page">
                <i class="bi bi-diagram-2"></i> -- Admin Access --
            </small>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/surat') ? 'active' : '' }}" aria-current="page" href="/dashboard/surat">
                <i class="bi bi-envelope-paper"></i>
            - Surat masuk
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/seluruhsurat') ? 'active' : '' }}" aria-current="page" href="/dashboard/seluruhsurat">
                <i class="bi bi-mailbox"></i>
            - Seluruh Surat
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/pengarsipan') ? 'active' : '' }}" aria-current="page" href="/dashboard/pengarsipan">
                <i class="bi bi-safe2"></i>
            - Pengarsipan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/kelolaakun*') ? 'active' : '' }}" aria-current="page" href="/dashboard/kelolaakun">
                <i class="bi bi-person-lines-fill"></i>
            - Kelola User
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('dashboard/jenissurat*') ? 'active' : '' }} {{ Request::is('dashboard/sifatsurat*') ? 'active' : '' }}" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-envelope-at"></i>Tambah Data Surat</a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item nav-item" href="/dashboard/jenissurat">Jenis Surat</a></li>
            <li><a class="dropdown-item nav-item" href="/dashboard/sifatsurat">Sifat Surat</a></li>
            </ul>
        </li>
        </ul>
        
    </div>
    {{-- @endcan --}}
</nav>