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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
                <img class="person" src="{{ asset('assets/images/lurah-sei-enam.png') }}" alt="">
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
                <p>
                    Sei Enam merupakan salah satu kelurahan yang ada di Kecamatan Bintan Timur, Kabupaten Bintan, Provinsi Kepulauan Riau. Berdasarkan informasi dari https://kampungkb.bkkbn.go.id/, kelurahan Sungai Enam memiliki luas wilayah 52,50 Km2 , dan dihuni sekitar lebih dari 2.713  jiwa penduduk. Sesuai dengan namanya, yaitu Sei Enam, kelurahan ini yang dilingkari oleh enam sungai, yaitu Sungai Kalang Tua, Sungai Tg Tili, Sungai Awat, Sungai Ulu Arang, Sungai Semaram, dan Sungai Mantang.
                </p>
            </div>
            <img clas="img-grad-left" src="{{asset('assets/images/seienam.jpg')}}" alt="">
        </div>
    </div>

    <div class="berita">
        <h1>Berita Terbaru</h1>
        <hr>
        <div class="berita-list" id="beritaList">
            @for($i=0;$i<5;$i++)
            
            @endfor
        </div>
    </div>


    <div class="main2">
        <h1 class="section-title">Produk Unggulan</h1>
        <hr>
        <div class="profile2">
            <div class="desc">
                <h2>Kuliner Otak Otak</h2>
                <p>
                    Otak-otak Sei Enam merupakan kuliner khas yang menjadi kebanggaan masyarakat Kelurahan Sei Enam, Bintan. Hidangan ini terbuat dari olahan ikan segar hasil tangkapan laut setempat, seperti ikan tenggiri atau cumi-cumi, yang memberikan cita rasa autentik dengan tekstur yang lembut. Proses pembuatannya melibatkan penghalusan bahan utama yang dicampur dengan bumbu khas Nusantara, seperti bawang putih, santan, dan berbagai rempah pilihan. Setelah itu, adonan dibungkus menggunakan daun kelapa muda, menambah daya tarik tradisionalnya.
Keunikan otak-otak Sei Enam terletak pada penggunaan daun kelapa sebagai pembungkus, yang memberikan aroma khas saat dipanggang di atas bara api. Hidangan ini tidak hanya menjadi makanan favorit masyarakat lokal, tetapi juga daya tarik wisata kuliner yang mampu memperkenalkan potensi daerah Sei Enam kepada para pengunjung.
                </p>
            </div>
            <!-- <div style="height: 100%;"> -->
                <div class="product-section">
                    <!-- <div class="clip img-grad-left">
                        <img class="" style="width : 100%; height :100%;" src="{{asset('assets/images/content/otak-otak.jpg')}}" alt="">
                    </div> -->
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
    let hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu', 'Minggu']
    let bulan = ['Januari', 'Februari', 'Maret','April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
    let navbar = document.getElementById('navbar');
    let logo = document.getElementById('logo');
    window.addEventListener("scroll", (event) => {
        let scroll = this.scrollY;
        //console.log(scroll)
        if(scroll>50){
            navbar.classList.add("down");
            logo.classList.add("down");
        }else{
            navbar.classList.remove("down");
            logo.classList.remove("down");
        }
        
       // console.log(logo);
    });

    function fetchBerita(){
        $.ajax({
            url : "{{$apiRoute}}/news",
            success : (res)=>{
                console.log(res.data);
                res.data.forEach((berita)=>{
                    const waktu = new Date(berita.time);
                    $("#beritaList")[0].innerHTML += `
                    <div class="berita-card">
                        <img class="icon" src="{{asset('assets/images/icon/bookmark.png')}}" alt="">
                        <h2>${berita.title}</h2>
                        <span class="timestamp">${hari[waktu.getDay()-1]}, ${waktu.getDate()} ${bulan[waktu.getMonth()]} ${waktu.getFullYear()}</span>
                        <p>${berita.content}</p>
                        <div class="berita-btn-area">
                            <a class="berita-btn" href="/berita?id=${berita.id}">Selengkapnya</a>
                        </div>
                    </div>
                    `;
                });
            },
            error : (err)=>{
                console.log(err);
            }
        });
    }


    fetchBerita();
</script>
