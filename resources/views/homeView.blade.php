<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kel.Sei Enam</title>
    <link rel="shortcut icon" href="{{asset('assets/images/logo/bintan.png')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font/ubuntu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    @include('feature.navbar')
    
    <div style="position: relative;">
        <div class="top-section">
            <video autoplay muted loop id="bg-video">
                <source src="{{ asset('assets/videos/DJI_0570~3.mp4') }}" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <div class="titles">
                <h1>Selamat Datang di </h1>
                <h1>Kelurahan Sei.Enam</h1>
            </div>
            <div class="top-section-2">
                <img class="person" src="{{ asset('assets/images/bupati.png') }}" alt="">
                <img class="bg" src="{{ asset('assets/images/background/design.png') }}" alt="">
            </div>
        </div>
    </div>

    <div class="profile-area">
        <div class="profile-card">
            <img src="{{asset('assets/images/icon/city.png')}}" alt="">
            <span>
                Profil Kelurahan
            </span>
        </div>
        <div class="profile-card">
            <img src="{{asset('assets/images/icon/rocket.png')}}" alt="">
            <span>
                Visi dan Misi
            </span>
        </div>
        <a class="profile-card" href="/pelayanan">
            <img src="{{asset('assets/images/icon/customer-service.png')}}" alt="">
            <span>
                Layanan
            </span>
        </a>
    </div>

    <div class="main">
        <h1 class="section-title">Profil Kelurahan</h1>
        <hr>
        <div class="profile">
            <div class="desc">
                <h2>Selamat Datang di Kelurahan Sei.Enam</h2>
                <p>Kelurahan Sei enam merupakan kelurahan yang berada di kabupaten bintan khusunya kijang</p>
                <p>
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                </p>
            </div>
            <img clas="img-grad-left" src="{{asset('assets/images/seienam.jpg')}}" alt="">
        </div>
    </div>

    <div class="berita">
        <h1>Berita Terbaru</h1>
        <hr>
        <div class="berita-list">
            @for($i=0;$i<5;$i++)
            <div class="berita-card">
                <img class="icon" src="{{asset('assets/images/icon/bookmark.png')}}" alt="">
                <h2>Judul Berita Disini</h2>
                <span class="timestamp">Senin, 2 Desember 2024</span>
                <p>Berita hari ini, penjualan otak-otak di Sei.Enam meningkat selama akhir tahun ini</p>
                <div class="berita-btn-area">
                    <button class="berita-btn">Selengkapnya</button>
                </div>
            </div>
            @endfor
        </div>
    </div>


    <div class="main2">
        <h1 class="section-title">Produk Unggulan</h1>
        <hr>
        <div class="profile2">
            <div class="desc">
                <h2>Kuliner Otak Otak</h2>
                <p>Kelurahan Sei enam merupakan kelurahan yang berada di kabupaten bintan khusunya kijang</p>
                <p>
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                </p>
            </div>
            <!-- <div style="height: 100%;"> -->
                <div class="product-section">
                    <div class="clip img-grad-left">
                        <img class="" style="width : 100%; height :100%;" src="{{asset('assets/images/content/otak-otak.jpg')}}" alt="">
                    </div>
                    <div class="clip2">
                        <img class="" style="width : 100%; height :100%;" src="{{asset('assets/images/content/otak-otak.jpg')}}" alt="">
                    </div>                
                </div>
            <!-- </div> -->
        </div>
    </div>

  
    @include('feature.footer')
</body>
</html>
<script>
    let navbar = document.getElementById('navbar');
    let logo = document.getElementById('logo');
    window.addEventListener("scroll", (event) => {
        let scroll = this.scrollY;
        console.log(scroll)
        if(scroll>50){
            navbar.classList.add("down");
            logo.classList.add("down");
        }else{
            navbar.classList.remove("down");
            logo.classList.remove("down");
        }
        
        console.log(logo);
    });
</script>
