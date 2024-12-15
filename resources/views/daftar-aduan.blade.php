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
    <link rel="stylesheet" href="{{asset('css/daftar-aduan.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/font/ubuntu.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
</head>
<body>
    @include('feature.navbar')

    <div class="pelayanan-main">
        <div>
            <br>
            <h1 class="header">Daftar Pengaduan</h1>
            <p class="keterangan">Berikut adalah daftar pengaduan masyarakat yang telah diterima kelurahan </p>
            <div class="btn-list">
                <a class="back-btn btn text-white" href="/pengaduan">
                    Kembali ke Pengaduan
                </a>
            </div>
        </div>

        <div class="form-area" >
            <table class="table table-striped" id="pengaduanTable">
                <thead>
                    <td>Nama</td>
                    <td>No.Whatsapp</td>
                    <td>Keluhan</td>
                </thead>
            </table>

        </div>
    </div>

    @include('feature.footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        let table = null;

       function getPengaduan(){
        $.ajax({
            url : "{{$apiRoute}}/pengaduan",
            success : (res)=>{
                let dataTable = [];
                console.log(res);

                if(res.status == 200){
                    res.data.forEach((data)=>{
                        dataTable.push([data.nama ?? "-", data.no_whatsapp ?? "-", data.keluhan ?? "-"]);
                    });

                    table = new DataTable("#pengaduanTable", {
                        columns : [
                            {title : "Nama"},
                            {title : "No.Whatsapp"},
                            {title : "Keluhan"}
                        ],
                        data : dataTable,
                        stateSave : true,
                        "bDestroy" : true
                    });

                }
               
            },
            error : (err)=>{
                console.log(err);
            }
        });
       }

       getPengaduan();
    </script>
</body>
</html>