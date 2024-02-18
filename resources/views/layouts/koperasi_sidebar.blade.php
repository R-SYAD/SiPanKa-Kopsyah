<!-- resources/views/layouts/sidebar.blade.php -->

<aside class="sidebar" id="sidebar">
    

    <div class="sidebar-sub-header" id="sidebar-sub-header">
        <p>SIPANKA KOPSYAH</p>
    </div>

    <ul>
        <li class="menu-item">
            <img src='/img/tabler_home.png' alt="Home Icon"> 
            <a href="{{ route('dashboardKoperasi') }}" >Dashboard</a>
        </li>

        <li class="menu-item">
            <img src='/img/dps.png' alt="Pemilihan DPS"> 
            <a href="{{ route('pemilihan_dps_koperasi') }}" >Pemilihan DPS</a>
        </li>
        
        <li class="menu-item">
            <img src='/img/koperasi.png' alt="Proses Konversi">
            <a href="{{ route('proses_konversi1_koperasi') }}" >Proses Konversi</a>
        </li>

        <li class="menu-item">
            <img src='/img/dps.png' alt="Hasil Pengawasan"> 
            <a href="{{ route('hasil_pengawasan_koperasi') }}" >Hasil Pengawasan</a>
        </li>
    
    </ul>

    <div class="logout">
        <a href="#" onclick="logout()">
            <img src='/img/keluar.png' alt="Logout Icon">
            Keluar
        </a>
    </div>
</aside>