@include('admin.feature.head')
<link rel="stylesheet" href="{{asset('css/admin/berita.css')}}">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.feature.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin.feature.topbar')
                <!-- End of Topbar -->


                @include('admin.feature.berita-modal')


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="mb-0 text-gray-800 text-bold">Data Berita Website</h1>
                        <div class="d-none d-sm-inline-block">
                            <a href="#" class=" btn btn-sm btn-primary shadow-sm"  data-bs-toggle="modal" data-bs-target="#addModal"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Tambah Berita</a>

                            <a href="#" class=" btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Buat Report</a>
                        </div>
                    </div>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div>
                        <table class="table" id="newsTable">
                            <thead>
                                <td>Judul Berita</td>
                                <td>Waktu</td>
                                <td>Kontent</td>
                                <td>Gambar</td>
                                <td style="text-align:end;">Aksi</td>
                            </thead>
                            <tbody id="tableBody">
                                
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           @include('admin.feature.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @include('admin.feature.script')

    <script>
        let datas = [];
        let table = null;
        function fetchBerita(){
            $.ajaxSetup({
                headers : {
                    "Authorization" : "Bearer "  + localStorage.getItem('apiToken'),
                    "Accept" : "application/json"
                }
            });

            $.ajax({
                url : "{{$apiRoute}}/news",
                success : (res)=>{
                    console.log(res);
                    let newsData = [];
                    if(res.status == 200){
                        datas = res.data;
                        res.data.forEach((berita, idx)=>{
                            newsData.push([
                                berita.title,
                                berita.time, 
                                berita.content,
                                berita.image ?? "-",
                                `
                                <div style="display : flex; column-gap : 1rem;">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="showDetail(${idx})"> Edit</button>
                                    <button class="btn btn-danger" onClick="destroyNews('${berita.id}')"> Hapus</button>
                                </div>
                                `
                            ]);
                        });

                        table = new DataTable("#newsTable", {
                            columns : [
                                {title : "Judul Berita"},
                                {title : "Waktu"},
                                {title : "Kontent"},
                                {title : "Gambar"},
                                {title : "Aksi"},
                            ],
                            data : newsData,
                            stateSave: true,
                            "bDestroy": true
                        });

                        
                        
                    }
                },
                error : (err)=>{
                    console.log(err);
                }
            });
        }


        function showDetail(idx){

            if(idx!=null){
                $("#idBerita")[0].value = datas[idx].id;
                $("#judulBerita")[0].value = datas[idx].title;
                $("#waktuBerita")[0].value = datas[idx].time;
                $("#kontenBerita")[0].innerHTML = datas[idx].content;
            }
        }

        function addNews(){

            console.log({
                title : $("#judulBeritaAdd")[0].value,
                waktu : $("#waktuBeritaAdd")[0].value,
                content : $("#kontenBeritaAdds")[0].value,
            });

            $.ajax({
                url : "{{$apiRoute}}/news",
                method : "POST",
                data : {
                    title : $("#judulBeritaAdd")[0].value,
                    time : $("#waktuBeritaAdd")[0].value,
                    content : $("#kontenBeritaAdds")[0].value,
                },
                success : async (res)=>{
                    fetchBerita();
                    let conf = await Swal.fire({
                        icon: res.status == 200 ? "success" : "error",
                        title: "Info",
                        text: res.message,
                    });
                },
                error : async (err)=>{
                    let conf = await Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: err.statusText,
                    });
                }
            });
        }

        function updateNews(){
            $.ajaxSetup({
                headers : {
                    "Authorization" : "Bearer "  + localStorage.getItem('apiToken'),
                    "Accept" : "application/json"
                }
            });

            $.ajax({
                url : "{{$apiRoute}}/news",
                method : "put",
                data : {
                    id : $("#idBerita")[0].value ,
                    title : $("#judulBerita")[0].value ,
                    time : $("#waktuBerita")[0].value,
                    content : $("#kontenBerita")[0].innerHTML,
                },
                success : (res)=>{
                    console.log(res);
                    if(res.status == 200){
                        fetchBerita();
                    }
                },
                error  : (err)=>{
                    alert(err.statusText);
                }
            });
        }


        function destroyNews(idx){
            console.log(idx);
            Swal.fire({
                title: "Hapus data berita ?",
                showCancelButton: true,
                confirmButtonText: "Iya",
                cancelButtonText: `Tidak`
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
         
                    $.ajaxSetup({
                        headers : {
                            "Authorization" : "Bearer " + localStorage.getItem("apiToken"),
                            "Accept" : "application/json"
                        }
                    });

                    $.ajax({
                        url : "{{$apiRoute}}/news",
                        method : "delete",
                        data : {
                            id : idx
                        },
                        success : async (res)=>{
                            let conf = await Swal.fire({
                                icon: res.status == 200 ? "success" : "error",
                                title: "Info",
                                text: res.message,
                              });
                            fetchBerita();
                        },
                        error : (err)=>{
                            console.log(err);
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: err.statusText,
                              });
                        }
                    });

                } else {
                  Swal.fire("Aksi dibatalkan !", "", "info");
                }
              });
        }
        

        fetchBerita();

    </script>
</body>

</html>