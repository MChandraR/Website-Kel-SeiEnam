<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="{{asset('assets/images/logo/bintan.png')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/pelayanan.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/font/ubuntu.css')}}">
</head>
<body>
    @include('feature.navbar')

    <div class="pelayanan-main">
        <div>
            <h1 class="header">Selamat Datang di Halaman Pelayanan</h1>
            <p class="keterangan">Silahkan memilih jenis layanan yang ingin diakses pada menu disamping, isi data yang diperlukan kemudian tunggu hingga proses selesai  </p>
            <div class="btn-list">
                <button class="back-btn btn text-white">
                    Kembali ke Beranda
                </button>
                <button class="btn btn-warning text-white fw-bold">
                    Lihat Daftar
                </button>
            </div>
        </div>

        <div class="service-list">
            <?php 
            
                $pelayanan = [
                    "Pengajuan SKTM",
                    "Surat Pindah",
                ];
            ?>
            @foreach($pelayanan as $layanan)
            <div class="service-card">
                <img src="{{asset('assets/images/icon/documents.png')}}" alt="">
                <h5>{{$layanan}}</h5>
            </div>
            @endforeach
        </div>
    </div>

    @include('feature.footer')
</body>
</html>