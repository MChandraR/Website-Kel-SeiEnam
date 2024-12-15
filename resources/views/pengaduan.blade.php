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
    <link rel="stylesheet" href="{{asset('css/pengaduan.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/font/ubuntu.css')}}">
</head>
<body>
    @include('feature.navbar')

    <div class="pelayanan-main">
        <div>
            <h1 class="header">Selamat Datang di Halaman Pengaduan</h1>
            <p class="keterangan">Silahkan memilih jenis pengaduan yang ingin diakses pada menu disamping, isi data yang diperlukan kemudian tunggu hingga proses selesai  </p>
            <div class="btn-list">
                <a class="back-btn btn text-white" href="/">
                    Kembali ke Beranda
                </a>
                <a class="back-btn btn btn-warning text-white fw-bold" href="/daftar-aduan" style="background-color : #ffc107;">
                    Lihat Daftar Pengaduan
                </a>
            </div>
        </div>

        <div class="form-area">
            <div class="mb-3 text-bold">
                <label for="exampleFormControlInput1" class="form-label h4">Nomor Whatsapp</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nomor whatsapp anda">
            </div>

            <div class="mb-3 text-bold">
                <label for="exampleFormControlInput1" class="form-label h4">Nama Alias</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama panggilan jika perlu dihubungi">
            </div>

            <div class="mb-3 text-bold">
                <label for="exampleFormControlInput1" class="form-label h4">Alasan pengaduan</label>
                <textarea type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan keluhan atau saran anda disini !"></textarea>
            </div>

            <div style="display : flex; justify-cotent : right;">
                <button class="btn btn-primary ">Adukan</button>
            </div>

        </div>
    </div>

    @include('feature.footer')
</body>
</html>