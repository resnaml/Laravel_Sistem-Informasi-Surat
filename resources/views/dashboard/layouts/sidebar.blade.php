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
            <a class="nav-link {{ Request::is('dashboard/suratkeluar*') ? 'active' : '' }}" aria-current="page" href="/dashboard/suratkeluar">
                <i class="bi bi-envelope-plus"></i> Surat Keluar
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/suratsaya') ? 'active' : '' }}" aria-current="page" href="/dashboard/suratsaya">
                <i class="bi bi-envelope-paper"></i> Surat Saya
            </a>
        </li>

        @can('kepala')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/surat') ? 'active' : '' }}" aria-current="page" href="/dashboard/surat">
                <i class="bi bi-journal-check"></i> Disposisi Surat 
                {{-- <span class="badge bg-primary rounded-pill">{{ $jumlah }}</span> --}}
            
            </a>
        </li>
        @endcan

        @can('admin')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/seluruhsurat') ? 'active' : '' }}" aria-current="page" href="/dashboard/seluruhsurat">
                <i class="bi bi-mailbox"></i> Seluruh Surat
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/pengarsipan') ? 'active' : '' }}" aria-current="page" href="/dashboard/pengarsipan">
                <i class="bi bi-safe2"></i> Pengarsipan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/kelolaakun') ? 'active' : '' }}" aria-current="page" href="/dashboard/kelolaakun">
                <i class="bi bi-person-lines-fill"></i> Kelola User
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::is('dashboard/jenissurat*') ? 'active' : '' }} {{ Request::is('dashboard/sifatsurat*') ? 'active' : '' }}" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-file-earmark-plus"></i> Tambah Data Surat</a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item nav-item" href="/dashboard/jenissurat">Jenis Surat</a></li>
            <li><a class="dropdown-item nav-item" href="/dashboard/sifatsurat">Sifat Surat</a></li>
            </ul>
        </li>
        </ul>
        
        @endcan

    </div>
</nav>