<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard <sup>v.1</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Surats Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Surats"
            aria-expanded="true" aria-controls="Surats">
            <i class="fas fa-fw fa-cog"></i>
            <span>Surats</span>
        </a>
        <div id="Surats" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Surats Components:</h6>
                <a class="collapse-item" href="/suratsaya">Surat Saya</a>
                @cannot('kepala')
                <a class="collapse-item" href="/surats">Daftar Surat</a>
                <a class="collapse-item" href="/surats/create">Buat Surat</a>
                @endcannot
            </div>
        </div>
    </li>
    
    <hr class="sidebar-divider">

    @can('admin')
    <div class="sidebar-heading">
        Admin
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span> - </span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Admin Component:</h6>
                <a class="collapse-item" href="/suratmasuk">Surat Masuk</a>
                <a class="collapse-item" href="/seluruhsurat">Seluruh Surat</a>
                <a class="collapse-item" href="/kelolaakun">Daftar User</a>
                <a class="collapse-item" href="/jenissurat">Jenis Surat</a>
                <a class="collapse-item" href="/pengarsipan">Pengarsipan</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    @endcan

    @can('kepala')
    <div class="sidebar-heading">
        Kepala
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>-</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kepala Component:</h6>
                <a class="collapse-item" href="/diposisi">Disposisi Surat</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    @endcan

</ul>