<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="{{asset('assets/images/logo/bintan.png')}}">
    <link rel="stylesheet" href="{{asset('css/font/ubuntu.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/pengajuan.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
</head>
<body>
    @include('feature.navbar')

    <div class="main">
        <a class="btn btn-primary" href="/layanan"> < Kembali ke layanan</a>
        <br><br>
        <h1>Selamat datang di menu pengajuan {{$pengajuan}}</h1>
        <p>Silahkan isi data untuk surat yang dibutuhkan pada form dibawah ini :</p>
        
        @include('form.ahliwaris')

        
    </div>

    @include('feature.footer')
</body>
</html>