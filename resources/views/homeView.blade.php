<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/font/ubuntu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div style="position: relative;">
        <nav id="navbar">
            <div class="nav-title">
                <img id="logo" src="{{ asset('images/logo/bintan.png') }}" width="50" height="50" alt="">
                <div>
                    <h1 style="margin : 0;">Kelurahan Sei.Enam</h1>
                    <span>Sungai Enam, Kec. Bintan Timur, Kabupaten Bintan, Kepulauan Riau 29151</span>
                </div>
            </div>

            <div class="nav-item">
                <a href="">Beranda</a>
                <a href="">Profil</a>
                <a href="">Kontak</a>
                <a href="">Layanan</a>
            </div>
        </nav>
        <div class="top-section">
            <video autoplay muted loop id="bg-video">
                <source src="{{ asset('video/DJI_0570.MP4') }}" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <div class="title">
                <h1>Selamat Datang di </h1>
                <h1>Kelurahan Sei.Enam</h1>
            </div>
            <div class="top-section-2">
                <img class="person" src="{{ asset('images/bupati.png') }}" alt="">
                <img class="bg" src="{{ asset('images/background/design.png') }}" alt="">
            </div>
        </div>
    </div>

    <div>
        <?php 
        if ($handle = opendir('.')) {

            while (false !== ($entry = readdir($handle))) {
        
                if ($entry != "." && $entry != "..") {
        
                    echo "$entry\n";
                }
            }
        
            closedir($handle);
        }?>
    </div>
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
