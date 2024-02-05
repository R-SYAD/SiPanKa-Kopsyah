<!-- resources/views/layouts/sidebar.blade.php -->

<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src='/img/profile_admin.png' alt="Admin Profile">
        <p>Admin</p>
    </div>

    <div class="sidebar-sub-header" id="sidebar-sub-header">
        <p>SIPANKA KOPSYAH</p>
    </div>


    <ul>
        <li class="menu-item">
            <img src='/img/tabler_home.png' alt="Home Icon"> 
            <a href="{{ route('dashboard_kabkota') }}" >Dashboard</a>
        </li>
        
        
        <li class="menu-item">
            <img src='/img/manajemen_kab.png' alt="Manajemen Kab"> 
            <a href="{{ route('pengawasandps_kabkota') }}">Pengawasan DPS</a>
        </li>

        <li class="parent-menu">
            <li class="menu-item">
            <img src='/img/dps.png' alt="Manajemen dps"> 
            <a href="#" onclick="toggleSubMenu('dpsSubMenu')">Manajemen Koperasi <span class="arrow">&#11167;</span></a>
            </li>

            <ul id="dpsSubMenu" class="submenu">
                <li class="menu-item">
                    <img src='/img/dps.png' alt="Manajemen dps"> 
                    <a href="{{ route('adminkoperasi_kabkota') }}">Admin Koperasi</a>
                </li>

                <li class="menu-item">
                    <img src='/img/dps.png' alt="Manajemen dps"> 
                    <a href="{{ route('konversikoperasi_kabkota') }}">Konversi Koperasi</a>
                </li>
            </ul>
        </li>

    </ul>

    <div class="logout">
        <a href="#" onclick="logout()">
            <img src='/img/keluar.png' alt="Logout Icon">
            Keluar
        </a>
    </div>
</aside>
