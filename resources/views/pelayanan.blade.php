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
                <a class="back-btn btn text-white" href="/">
                    Kembali ke Beranda
                </a>
                <a class="back-btn btn btn-warning text-white fw-bold" href="/daftar-pengajuan" style="background-color : #ffc107;">
                    Lihat Daftar
                </a>
            </div>
        </div>

        <div class="service-list">
            <?php 
            
                $pelayanan = [
                    [
                        "name" => "Surat Ahli Waris",
                        "url" => "/pengajuan?tipe=ahliwaris"
                    ],
                    [
                        "name" => "Surat Keterangan Penghasilan",
                        "url" => "/pengajuan?tipe=skp"
                    ],
                    [
                        "name" => "Surat Kematian",
                        "url" => "/pengajuan?tipe=suratkematian"
                    ],
                    [
                        "name" => "Surat Keterangan Domisili ",
                        "url" => "/pengajuan?tipe=suratpindah"
                    ]
                ];
            ?>
            @foreach($pelayanan as $layanan)
            <a class="service-card" href="{{$layanan["url"]}}">
                <img src="{{asset('assets/images/icon/documents.png')}}" alt="">
                <h5>{{$layanan["name"]}}</h5>
            </a>
            @endforeach
        </div>
    </div>

    @include('feature.footer')
</body>

</html>