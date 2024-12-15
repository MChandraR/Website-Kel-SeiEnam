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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

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
                <input type="email" class="form-control" id="waField" placeholder="Masukkan nomor whatsapp anda jika perlu dihubungi">
            </div>

            <div class="mb-3 text-bold">
                <label for="exampleFormControlInput1" class="form-label h4">Nama Alias</label>
                <input type="email" class="form-control" id="namaField" placeholder="Masukkan nama panggilan jika perlu dihubungi">
            </div>

            <div class="mb-3 text-bold">
                <label for="exampleFormControlInput1" class="form-label h4">Alasan pengaduan</label>
                <textarea type="email" class="form-control " style="height : 8rem;" id="keluhanField" placeholder="Masukkan keluhan atau saran anda disini !"></textarea>
            </div>

            <div style="display : flex; justify-content : right;">
                <button class="btn btn-primary " onClick="addPengaduan()">Adukan</button>
            </div>

        </div>
    </div>

    @include('feature.footer')


    <script>
        function addPengaduan(){
            $.ajax({
                url : "{{$apiRoute}}/pengaduan",
                method : "POST",
                data : {
                    nama : $("#namaField")[0].value,
                    no_whatsapp : $("#waField")[0].value,
                    keluhan : $("#keluhanField")[0].value,
                },
                success : (res)=>{
                    if(res.status == 200){
                        $("#namaField")[0].value = "";
                        $("#waField")[0].value = "";
                        $("#keluhanField")[0].value = "";
                    }

                    console.log(res);
                },
                error : (err)=>{
                    alert(err);
                }
            });
        }
    </script>
</body>
</html>