@include('admin.feature.head')
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


                @include('admin.feature.permohonan-modal')


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">List Permohonan Surat</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Buat Report</a>
                    </div>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div>
                        <table class="table" id="pengajuanTable">
                            <thead>
                                <td>ID_Permohonan</td>
                                <td>No Whatsapp</td>
                                <td>Jenis Permohonan</td>
                                <td>Tanggal Diminta</td>
                                <td>Status</td>
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

        let data = [];
        function fetchData(){
            const token = localStorage.getItem('apiToken');
            $("#tableBody").innerHTML = "";
            console.log( $('meta[name="csrf-token"]').attr('content'));
            $.ajaxSetup({
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let status = {
                pending : "diproses",
                diproses : "selesai"
            }

            let jenis = [
            "SKP",
            "Ahli Waris",
            "Surat Kematian"
            ];

            $.ajax({
                url :  "{{$apiRoute}}/pengajuan",
                success : (res)=>{
                    let datas = [];
                    console.log(res);
                    data = res.data;
                    res.data.forEach((data, idx)=>{
                        datas.push([data.pemohon,data.no_whatsapp ?? "",  jenis[data.tipe] ?? "", new Date(data.created_at).toLocaleString(), data.status??"", 
                        `<div style="display:flex; justify-content : right ; column-gap : 1rem;">
                        <button class="btn btn-${data.status == "pending" ?  "success" : "warning"}" onClick="updateData('${data.id}', '${status[data.status]}')">${data.status == "pending" ? "Proses" : "Selesai"}</button>
                        <button class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="showDetail('${idx}')"> Lihat </button>
                        </div>
                        `]);
                    });
                    console.log(datas);
                    table = new DataTable("#pengajuanTable", {
                        columns :[
                            {title : "Pemohon"},
                            {title : "No Whatsapp"},
                            {title : "Jenis Permohonan"},
                            {title : "Tanggal Diminta"},
                            {title : "Status"},
                            {title : "Aksi"},
                        ],
                        data : datas,
                        stateSave: true,
                        "bDestroy": true
                    });
                },
                error : (err)=>{

                }
            });
        }


        function showDetail(idx){
            $("#detailPengajuan")[0].innerHTML = "";
            for(let key in data[idx]){
                let doc = "";
                if(typeof data[idx][key] == "string" && data[idx][key].includes("/")){
                    let name = data[idx][key];
                    name = name.split("/");
                    name = name[name.length-1];
                    doc = `<a  id="${key}" class="form-control btn btn-primary text-black" id="basic-url" aria-describedby="basic-addon3" readonly style="color : black;" href="${data[idx][key]}">Lihat file</a>`;

                }else {
                     doc = `<input type="text" id="${key}" class="form-control" id="basic-url" value="${data[idx][key]}" aria-describedby="basic-addon3" readonly>`;
                }
                    console.log(key, data[idx][key]);
                $("#detailPengajuan")[0].innerHTML += `
                <div class=" mb-3">
                    <label class="form-label" id="basic-addon3">${key}</label>
                    ${doc}
                </div>
                `;
            }
        }


        function updateData(idx, status){
            $.ajaxSetup({
                headers : {
                    "Authorization" : "Bearer "  + localStorage.getItem('apiToken'),
                    "Accept" : "application/json"
                }
            });


            $.ajax({
                url : "{{$apiRoute}}/pengajuan",
                method : "put",
                data : {
                    id : idx,
                    status : status
                },
                success : (res)=>{
                    console.log(res);
                    fetchData();
                },
                error : (err)=>{
                    console.log(err.statusText);
                }
            });
        }

        fetchData();
    </script>
</body>

</html>