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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    @include('feature.navbar')
    <?php
        $name = [
            "ahliwaris" => "Ahli Waris",
            "skp" => "Surat Keterangan Penghasilan",
            "suratkematian" => "Surat Kematian",
        ];
    ?>

    <div class="main">
        <a class="btn btn-primary" href="/layanan"> < Kembali ke layanan</a>
        <br><br>
        <h1>Selamat datang di menu pengajuan {{$name[$pengajuan]}}</h1>
        <p>Silahkan isi data untuk surat yang dibutuhkan pada form dibawah ini :</p>
        
    


        @if($pengajuan=="ahliwaris")
            @include('form.ahliwaris')
        @elseif($pengajuan=="skp")
            @include('form.skp')
        @elseif($pengajuan=="suratkematian")
            @include('form.kematian')
        @endif
    </div>

    @include('feature.footer')
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>