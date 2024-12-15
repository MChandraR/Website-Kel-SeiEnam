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
    <link rel="stylesheet" href="{{asset('css/pelayanan.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/font/ubuntu.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

</head>
<body>
    @include('feature.navbar')

    <div class="pelayanan-main">
        <div>
            <h1 class="header">Selamat Datang di Halaman Daftar Pelayanan</h1>
            <p class="keterangan">Berikut adalah daftar pengajuan surat oleh penduduk kelurahan Sei.Enam  </p>
            <div class="btn-list">
                <a class="back-btn btn text-white" href="/layanan">
                    Kembali ke Layanan
                </a>
            </div>
        </div>

        <div>
            <h2>Daftar Pengajuan</h2>
            <table class="table" id="daftarTable">
                <thead class="bg-primary text-white">
                    <td>Pemohon</td>
                    <td>No.Whatsapp</td>
                    <td>Jenis Surat</td>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    @include('feature.footer')
</body>

<script>
    let table =null;
    let tipe_surat = [
        "Ahli Waris"
    ];

    function fetchDataPengajuan(){
        $.ajax({
            url : "{{$apiRoute}}/daftar-pengajuan",
            success : (res)=>{
                let data =[];
                console.log(res);
                res.data.forEach((dat)=>{
                    data.push([dat.pemohon, dat.no_whatsapp, tipe_surat[dat.tipe] ?? "-"]);
                });

                table = new DataTable("#daftarTable", {
                    columns : [
                        {title : "Pemohon"},
                        {title : "No.Whatsapp"},
                        {title : "Tipe Surat"}
                    ], 
                    data : data,
                    stateSave: true,
                    "bDestroy": true
                })

            },
            error : (err)=>{
                console.log(err);
            }
        });
    }

    fetchDataPengajuan();
</script>
</html>