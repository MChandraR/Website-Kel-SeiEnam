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
    <link rel="stylesheet" href="{{asset('css/daftar-pengaduan.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/font/ubuntu.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>
<body>
    @include('feature.navbar')

    <div class="pelayanan-main">
        <div>
            <h1 class="header">Selamat Datang di Halaman Pengaduan</h1>
            <p class="keterangan">Silahkan memilih jenis pengaduan yang ingin diakses pada menu disamping, isi data yang diperlukan kemudian tunggu hingga proses selesai  </p>
            <div class="btn-list">
                <a class="back-btn btn text-white" href="/pengaduan">
                    Kembali ke Pengaduan
                </a>
            </div>
        </div>

        <div class="form-area" >
            <table class="table">
                <thead>
                    <td>Nama</td>
                    <td>No.Whatsapp</td>
                    <td>Keluhan</td>
                </thead>
            </table>

        </div>
    </div>

    @include('feature.footer')


    <script>
       
    </script>
</body>
</html>