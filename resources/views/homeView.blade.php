<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/font/ubuntu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    @include('feature.navbar')

    <div class="main">
        <h1 class="section-title">Profil Desa</h1>
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

    <div class="main">
        <h1 class="section-title">Produk Unggulan</h1>
        <hr>
        <div class="profile">
            <div class="desc">
                <h2>Kuliner Otak Otak</h2>
                <p>Kelurahan Sei enam merupakan kelurahan yang berada di kabupaten bintan khusunya kijang</p>
                <p>
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                </p>
            </div>
            <img class="img-grad-left clip" style="width : 150%;" src="{{asset('assets/images/content/otak-otak.jpg')}}" alt="">
        </div>
    </div>

    <footer>
        <div class="footer-main">
            <div class="footer-section">
                <h2>Kontak Kami</h2>
                <hr><br>
                <div class="contact-section">
                    <img width="30" src="/assets/images/icon/email.png" alt="">
                    <span>kelurahanseienam@gmail.com</span>
                </div>
                <div class="contact-section">
                    <img width="30" src="/assets/images/icon/telephone.png" alt="">
                    <span>0812 2342 9375</span>
                </div>
                <div class="contact-section">
                    <img width="30" src="/assets/images/icon/instagram.png" alt="">
                    <span>0812 2342 9375</span>
                </div>


                <!-- kalender -->
                 @include('feature.calendar')
            </div>

            <div class="footer-section">
                <h2>Tentang Kami</h2>
                <hr><br>
                <p>Alamat : Sungai Enam, Kec. Bintan Tim., Kabupaten Bintan, Kepulauan Riau 29151</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7259.21165709668!2d104.59497792378137!3d0.8167234104521148!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d9143eaa72b809%3A0xe92cd07208b46646!2sKelurahan%20Sungai%20Enam!5e0!3m2!1sid!2sid!4v1732967762057!5m2!1sid!2sid" style="border:0; width:80%; height : 50vh  " allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <center>
            <span class="copyright">
                Kelurahan Sei enam copyright@2024
            </span>
        </center>
    </footer>
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
