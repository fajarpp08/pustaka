<nav class="sidebar">
    <div class="logo d-flex flex-column align-items-center">
        <a href="/dashboardadmin"><img src="../assets-admin/img/logo.png" alt></a>
        <div class="text-center mt-2">
            <a class="logo-text">Perpustakaan MTsN Parak Laweh</a>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="{{ Request::is('dashboardadmin*') ? 'mm-active active' : '' }}">
            <a class="" href="/dashboardadmin">
                <img src="../assets-admin/img/menu-icon/home.svg" alt>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="{{ Request::is('data-kategori*') ? 'mm-active active' : '' }}">
            <a class="" href="/data-kategori" aria-expanded="false">
                <img src="../assets-admin/img/menu-icon/category.svg" alt>
                <span>Data Kategori</span>
            </a>
        </li>
        <li class="{{ Request::is('data-buku*') ? 'mm-active active' : '' }}">
            <a class="" href="/data-buku" aria-expanded="false">
                <img src="../assets-admin/img/menu-icon/book.svg" alt>
                <span>Data Buku</span>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="../assets-admin/img/menu-icon/transaction.svg" alt>
                <span>Data Transaksi</span>
            </a>
            <ul>
                <li class="{{ Request::is('data-peminjaman*') ? 'mm-active active' : '' }}"><a
                        href="/data-peminjaman">Data Peminjaman</a></li>
                <li class="{{ Request::is('data-pengembalian*') ? 'mm-active active' : '' }}"><a
                        href="/data-pengembalian">Data Pengembalian</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="../assets-admin/img/menu-icon/print.svg" alt>
                <span>Laporan</span>
            </a>
            <ul>
                <li class="{{ Request::is('laporanpeminjaman*') ? 'mm-active active' : '' }}"><a
                        href="/laporanpeminjaman">Laporan Peminjaman</a></li>
                <li class="{{ Request::is('laporanpengembalian*') ? 'mm-active active' : '' }}"><a
                        href="/laporanpengembalian">Laporan Pengembalian</a></li>
            </ul>
        </li>
        <li class="{{ Request::is('data-pengumuman*') ? 'mm-active active' : '' }}">
            <a class="" href="/data-pengumuman" aria-expanded="false">
                <img src="../assets-admin/img/menu-icon/announcement.svg" alt>
                <span>Pengumuman</span>
            </a>
        </li>
        <li class="{{ Request::is('data-galeri*') ? 'mm-active active' : '' }}">
            <a class="" href="/data-galeri" aria-expanded="false">
                <img src="../assets-admin/img/menu-icon/gallery.svg" alt>
                <span>Galeri</span>
            </a>
        </li>
        <li class="{{ Request::is('data-user*') ? 'mm-active active' : '' }}">
            <a class="" href="/data-user" aria-expanded="false">
                <img src="../assets-admin/img/menu-icon/user.svg" alt>
                <span>User</span>
            </a>
        </li>
    </ul>
</nav>
