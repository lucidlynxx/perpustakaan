<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/dashboard">
             <span class="align-middle">Perpustakaan</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Data User
            </li>

            <li class="sidebar-item {{ Request::is('dashboard/data-siswa*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard/data-siswa">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data Siswa</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('dashboard/data-administrator*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard/data-administrator">
                    <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Data Administrator</span>
                </a>
            </li>

            <li class="sidebar-header">
                Data Buku
            </li>

            <li class="sidebar-item {{ Request::is('dashboard/data-buku*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard/data-buku">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Buku</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('dashboard/data-rak*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard/data-rak">
                    <i class="align-middle" data-feather="inbox"></i> <span class="align-middle">Data Rak Buku</span>
                </a>
            </li>

            <li class="sidebar-header">
                Data Transaksi
            </li>

            <li class="sidebar-item {{ Request::is('dashboard/data-peminjaman*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard/data-peminjaman">
                    <i class="align-middle" data-feather="tag"></i> <span class="align-middle">Data Peminjaman</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('dashboard/data-laporan*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard/data-laporan">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Laporan</span>
                </a>
            </li>
        </ul>

    </div>
</nav>