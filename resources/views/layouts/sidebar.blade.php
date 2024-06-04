<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="logo">
            <img src="{{ asset('img/SambangLihum.png') }}" alt="Logo" width="60" height="auto">
        </div>
        <div class="sidebar-brand-text mx-3">SIMA RSJ Sambang Lihum</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link menu-header">
            <i class="fa-solid"></i>
            <span>Menu</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fa-solid fa-gauge-high"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('aset') }}">
            <i class="fa-solid fa-boxes-stacked"></i>
            <span>Data Aset</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('mutasi') }}">
            <i class="fa-solid fa-arrow-right-arrow-left"></i>
            <span>Mutasi Aset</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('pemeliharaan') }}">
            <i class="fa-solid fa-gears"></i>
            <span>Pemeliharaan Aset</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('peminjaman') }}">
            <i class="fa-solid fa-people-carry-box"></i>
            <span>Peminjaman Aset</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('ruangan') }}">
            <i class="fa-solid fa-building"></i>
            <span>Ruangan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-users"></i>
            <span>Kepemilikan Aset</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link menu-header">
            <i class="fa-solid"></i>
            <span>Other</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-gear"></i>
            <span>Hak Akses</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Log Out</span></a>
    </li>

</ul>