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
            <a class="nav-link {{ Request::is('suratsaya') ? 'active' : '' }}" aria-current="page" href="/suratsaya">
                <i class="bi bi-envelope-paper"></i> Surat Saya
            </a>
        </li>

        @can('kepala')
        <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#diposisikepala" aria-expanded="false"><i class="bi bi-person-badge"></i> Kepala
            </button>
            <div class="collapse" id="diposisikepala">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="/diposisikepala" class="link-body-emphasis d-inline-flex text-decoration-none rounded {{ Request::is('diposisikepala*') ? 'active' : '' }}"><i class="bi bi-clipboard2-check"></i> Disposisi Surat</a></li>
                </ul>
            </div>
        </li>
        @endcan

        @can('admin')
        <li class="nav-item">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#admin" aria-expanded="false"><i class="bi bi-person-badge-fill"></i> Admin
            </button>
            <div class="collapse" id="admin">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="/suratmasuk" class="link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-envelope-exclamation-fill"></i> Surat Masuk </a></li>
                <li><a href="/seluruhsurat" class="link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-mailbox"></i> Seluruh Surat</a></li>
                <li><a href="/pengarsipan" class="link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-safe2"></i> Pengarsipan</a></li>
                <li><a href="/kelolaakun" class="link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-person-lines-fill"></i> Kelola User</a></li>
                </ul>
            </div>
        </li>

        
        <li class="nav-item">
            <a class="nav-link {{ Request::is('suratmasuk') ? 'active' : '' }}" aria-current="page" href="/suratmasuk">
                <i class="bi bi-envelope-exclamation-fill"></i> Surat Masuk 
                {{-- <span class="badge bg-primary rounded-pill">{{ $jumlah }}</span> --}}
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('seluruhsurat') ? 'active' : '' }}" aria-current="page" href="/seluruhsurat"><i class="bi bi-mailbox"></i> Seluruh Surat
            </a>
        </li>        

        <li class="nav-item">
            <a class="nav-link {{ Request::is('pengarsipan') ? 'active' : '' }}" aria-current="page" href="/pengarsipan">
                <i class="bi bi-safe2"></i> Pengarsipan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('kelolaakun*') ? 'active' : '' }}" aria-current="page" href="/kelolaakun">
                <i class="bi bi-person-lines-fill"></i> Kelola User
            </a>
        </li> --}}
        

        <li class="nav-item">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#datasurat" aria-expanded="false"> <i class="bi bi-file-earmark-plus"></i>
            Data Surat
            </button>
            <div class="collapse" id="datasurat">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="/jenissurat" class="link-body-emphasis d-inline-flex text-decoration-none rounded  {{ Request::is('jenissurat*') ? 'active' : '' }}"> Jenis Surat</a></li>
                <li><a href="/sifatsurat" class="link-body-emphasis d-inline-flex text-decoration-none rounded {{ Request::is('sifatsurat*') ? 'active' : '' }}"> Sifat Surat</a></li>
                </ul>
            </div>
        </li>
        </ul>
        
        @endcan

    </div>
</nav>