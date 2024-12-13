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
    <link rel="stylesheet" href="{{asset('css/berita-info.css')}}">
    <link rel="stylesheet" href="{{asset('css/pelayanan.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/font/ubuntu.css')}}">
</head>
<body>
    @include('feature.navbar')

    <div class="berita-main">
        <div>
            <h1 class="header">{{$berita->title ?? ""}}</h1>
            <h3>{{$berita->time ?? ""}}</h3>
            <p class="keterangan">{{$berita->content ?? ""}} </p>
            <div class="btn-list">
                <a class="btn btn-primary text-white py-10">
                    Kembali ke Beranda
                </a>
    
            </div>
        </div>

        <div class="berita-list">
           @foreach($beritaList as $data)
            <div class="berita-card">
                <h5>{{$data->title}}</h5>
                <span>{{$data->time}}</span>
                <p>{{$data->content}}</p>
                <div class="button-view-area">
                    <button class="btn btn-primary" >Selengkapnya</button>
                </div>
            </div>
           @endforeach
        </div>
    </div>

    @include('feature.footer')
</body>
</html>