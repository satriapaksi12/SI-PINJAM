<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item active ">
            <a href="/dashboard" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role_id == 1)
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-house"></i>
                <span> Ruangan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_ruang">Cek Jadwal</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reservasi-ruang">Tambah Reservasi </a>
                </li>
                <li class="submenu-item ">
                    <a href="/daftar-reservasi-ruang">Daftar Reservasi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-tools"></i>
                <span> Alat</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_alat">Cek Jadwal</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reservasi-alat">Tambah Reservasi </a>
                </li>
                <li class="submenu-item ">
                    <a href="/daftar-reservasi-alat">Daftar Reservasi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-truck"></i>
                <span> Kendaraan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_kendaraan">Cek Jadwal</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reservasi-kendaraan">Tambah Reservasi </a>
                </li>
                <li class="submenu-item ">
                    <a href="/daftar-reservasi-kendaraan">Daftar Reservasi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-title">Kelola Data Master</li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection"></i>
                <span>Kelola Aset</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/ruang"> Ruangan</a>
                </li>
                <li class="submenu-item ">
                    <a href="/alat">Alat</a>
                </li>
                <li class="submenu-item ">
                    <a href="/kendaraan">Kendaraan</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-clipboard-check"></i>
                <span>Kelola Reservasi</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/kelola-reservasi-ruang">Reservasi Ruangan</a>
                </li>
                <li class="submenu-item ">
                    <a href="/kelola-reservasi-alat">Reservasi Alat</a>
                </li>
                <li class="submenu-item ">
                    <a href="/kelola-reservasi-kendaraan">Reservasi Kendaraan</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  ">
            <a href="/periode" class='sidebar-link'>
                <i class="bi bi-calendar3"></i>
                <span>Kelola Periode</span>
            </a>
        </li>
        <li class="sidebar-item  ">
            <a href="/sesi" class='sidebar-link'>
                <i class="bi bi-clock"></i>
                <span>Kelola Sesi</span>
            </a>
        </li>
        <li class="sidebar-item  ">
            <a href="/jenis_acara" class='sidebar-link'>
                <i class="bi bi-calendar"></i>
                <span>Kelola Jenis Acara</span>
            </a>
        </li>
        <li class="sidebar-item  ">
            <a href="/jenis_kendaraan" class='sidebar-link'>
                <i class="bi bi-calendar"></i>
                <span>Kelola Jenis Kendaraan</span>
            </a>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-geo-alt-fill"></i>
                <span> Kelola Lokasi</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/gedung">Gedung</a>
                </li>
                <li class="submenu-item ">
                    <a href="/lokasi">Lokasi Kampus</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  ">
            <a href="/unit" class='sidebar-link'>
                <i class="bi bi-mortarboard"></i>
                <span>Kelola Unit</span>
            </a>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>Kelola User</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/user"> User Aktif</a>
                </li>
                <li class="submenu-item ">
                    <a href="/user-deleted"> User Non Aktif</a>
                </li>
                <li class="submenu-item ">
                    <a href="/role"> Role</a>
                </li>
            </ul>
        </li>
        @elseif (Auth::user()->role_id == 2)
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-house"></i>
                <span> Ruangan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_ruang">Cek Jadwal</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reservasi-ruang">Tambah Reservasi </a>
                </li>
                <li class="submenu-item ">
                    <a href="/daftar-reservasi-ruang">Daftar Reservasi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-tools"></i>
                <span> Alat</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_alat">Cek Jadwal</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reservasi-alat">Tambah Reservasi </a>
                </li>
                <li class="submenu-item ">
                    <a href="/daftar-reservasi-alat">Daftar Reservasi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-truck"></i>
                <span> Kendaraan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_kendaraan">Cek Jadwal</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reservasi-kendaraan">Tambah Reservasi </a>
                </li>
                <li class="submenu-item ">
                    <a href="/daftar-reservasi-kendaraan">Daftar Reservasi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-title">Kelola Data Master</li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-collection"></i>
                <span>Kelola Aset</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/ruang"> Ruangan</a>
                </li>
                <li class="submenu-item ">
                    <a href="/alat">Alat</a>
                </li>
                <li class="submenu-item ">
                    <a href="/kendaraan">Kendaraan</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-clipboard-check"></i>
                <span>Kelola Reservasi</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/kelola-reservasi-ruang">Reservasi Ruangan</a>
                </li>
                <li class="submenu-item ">
                    <a href="/kelola-reservasi-alat">Reservasi Alat</a>
                </li>
                <li class="submenu-item ">
                    <a href="/kelola-reservasi-kendaraan">Reservasi Kendaraan</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  ">
            <a href="/periode" class='sidebar-link'>
                <i class="bi bi-calendar3"></i>
                <span>Kelola Periode</span>
            </a>
        </li>
        <li class="sidebar-item  ">
            <a href="/sesi" class='sidebar-link'>
                <i class="bi bi-clock"></i>
                <span>Kelola Sesi</span>
            </a>
        </li>
        <li class="sidebar-item  ">
            <a href="/jenis_acara" class='sidebar-link'>
                <i class="bi bi-calendar"></i>
                <span>Kelola Jenis Acara</span>
            </a>
        </li>
        <li class="sidebar-item  ">
            <a href="/jenis_kendaraan" class='sidebar-link'>
                <i class="bi bi-calendar"></i>
                <span>Kelola Jenis Kendaraan</span>
            </a>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-geo-alt-fill"></i>
                <span> Kelola Lokasi</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/gedung">Gedung</a>
                </li>
                <li class="submenu-item ">
                    <a href="/lokasi">Lokasi Kampus</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  ">
            <a href="/unit" class='sidebar-link'>
                <i class="bi bi-mortarboard"></i>
                <span>Kelola Unit</span>
            </a>
        </li>

        @elseif (Auth::user()->role_id == 3)
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-house"></i>
                <span> Ruangan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_ruang">Cek Jadwal</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reservasi-ruang">Tambah Reservasi </a>
                </li>
                <li class="submenu-item ">
                    <a href="/daftar-reservasi-ruang">Daftar Reservasi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-tools"></i>
                <span> Alat</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_alat">Cek Jadwal</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reservasi-alat">Tambah Reservasi </a>
                </li>
                <li class="submenu-item ">
                    <a href="/daftar-reservasi-alat">Daftar Reservasi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-truck"></i>
                <span> Kendaraan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_kendaraan">Cek Jadwal</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reservasi-kendaraan">Tambah Reservasi </a>
                </li>
                <li class="submenu-item ">
                    <a href="/daftar-reservasi-kendaraan">Daftar Reservasi</a>
                </li>
            </ul>
        </li>
        @elseif (Auth::user()->role_id == 4)
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-house"></i>
                <span> Ruangan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_ruang">Cek Jadwal</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reservasi-ruang">Tambah Reservasi </a>
                </li>
                <li class="submenu-item ">
                    <a href="/daftar-reservasi-ruang">Daftar Reservasi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-tools"></i>
                <span> Alat</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_alat">Cek Jadwal</a>
                </li>
                <li class="submenu-item ">
                    <a href="/reservasi-alat">Tambah Reservasi </a>
                </li>
                <li class="submenu-item ">
                    <a href="/daftar-reservasi-alat">Daftar Reservasi</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-truck"></i>
                <span> Kendaraan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_kendaraan">Cek Jadwal</a>
                </li>
            </ul>
        </li>
        @elseif (Auth::user()->role_id == 5)
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-house"></i>
                <span> Ruangan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_ruang">Cek Jadwal</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-tools"></i>
                <span> Alat</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_alat">Cek Jadwal</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-truck"></i>
                <span> Kendaraan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="/cekJadwal_kendaraan">Cek Jadwal</a>
                </li>
            </ul>
        </li>
        @endif

    </ul>
</div>
