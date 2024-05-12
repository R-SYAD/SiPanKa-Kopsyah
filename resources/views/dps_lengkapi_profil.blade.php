<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-K6LH+HiMtlJ4C6r+qOzrnBeFZ7J11fJd3B0/WmARUq3Zcx6JJ86LWl18pNrCJFTZxDyQiOm/ujtB/Z3JSJTRoQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/navbarsidebar_dps.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lengkapiprofildps.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Sipanka KopSyah - Landing Page</title>
</head>

<body>
    @include('layouts.dps_sidebar')
    @include('layouts.dps_navbar')
    <script src="{{asset('js/script_dps.js')}}"></script>
    <!-- <script src="{{asset('js/dashboard_dps.js')}}"></script> -->

    <div class="content">
        <!-- Dalam main-box -->
        <div class="main-box">
            <!-- Box Profile -->
            <div class="profile-box">
                <h5 class="profile-title">Lengkapi Profil</h5>
                <div class="border-gray"></div> <!-- Border abu-abu di bawah judul -->
                <form id="updateProfileForm" action="{{ route('update_dps_profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="table-row">
                        <div class="table-col">
                            <label for="adminName">Nama Lengkap</label>
                            <input type="text" id="DpsName" name="nama_lengkap" value="@isset($dps){{ $dps->nama_lengkap }}@endisset">
                        </div>
                        <div class="table-col">
                            <label for="noHP">No HP</label>
                            <input type="text" id="noHp" name="kontak" value="@isset($dps){{ $dps->kontak }}@endisset">
                        </div>
                    </div>

                    <div class="table-row">
                        <div class="table-col full-width">
                            <label for="address">Alamat</label>
                            <input type="text" id="address" name="alamat" value="@isset($dps){{ $dps->alamat }}@endisset">
                        </div>
                    </div>
                    <!-- Baris keempat -->
                    <div class="table-row">
                        <div class="table-col full-width">
                            <label for="fileUpload">Upload Sertifikat</label>
                            <div class="file-input-wrapper">
                                <input type="file" id="fileUpload" name="sertifikat" style="display: none;" onchange="updateFileName()">
                                <button class="upload-button" onclick="document.getElementById('fileUpload').click()">Pilih File</button>
                                <input type="text" id="fileName" name="fileName" value="@isset($dps){{ $dps->sertifikat }}@endisset">
                                @if($dps->sertifikat)
                                    <a id="sertifikatPreview" href="{{ asset($dps->sertifikat) }}" target="_blank">Lihat Sertifikat</a>
                                @else
                                    <span>Sertifikat belum diunggah</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    

                    <!-- Baris keenam (tambahan) -->
                    <div class="table-row">
                        <div class="table-col full-width text-right"> <!-- Tambahkan kelas "text-right" di sini -->
                            <button type="submit" class="save-button" onclick="return confirm('Apakah Anda yakin ingin mengubah data?')">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS (jika menggunakan Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
