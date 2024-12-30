<link rel="stylesheet" href="{{asset('css/skp.css')}}">

<br>
<div>
    <form class="form-area" id="formArea">
        <!-- <div class="preview">
            <iframe src="/template/{{$pengajuan}}" frameborder="0"></iframe>
        </div> -->
        <div>
            <input type="text" name="tipe" value="skp" hidden>
            <h3>Data Permohonan</h3>
            <hr>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masukkan Nama Pemohon : </label>
                <input type="text" class="form-control" name="pemohon" placeholder="Masukkan nama lengkap pemohon">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masukkan No.Whatsapp: </label>
                <input type="number" class="form-control" name="no_whatsapp" placeholder="Masukkan nomor whatsapp yang dapat dihubungi">
            </div>
           

        </div>
        
        <div>
            <h3>Dokumen Pendukung</h3>
            <hr>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masukkan KTP : </label>
                <input type="file" class="form-control" name="ktp" placeholder="Upload foto ktp anda">
            </div>

        
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Surat Penghasilan  : </label>
                <input type="file" class="form-control" name="penghasilan" placeholder="Upload surat penghasilan ">
            </div>
        </div>
    </form>
    <center>
        <br><br><br>
        <div class="btn btn-primary btn-ajukan" onClick="addPengajuan()">Ajukan Surat</div>
    </center>

   
</div>

<script>

let kurangWaris = document.getElementById("kurang-waris");
let tambahWaris = document.getElementById("tambah-waris");
let warisList = document.getElementById("terwaris-list");
let counter = 0;
let form = document.getElementById("formArea");

function addPengajuan(){
    let data = new FormData(form);
    $.ajaxSetup({
        headers : {
            "Authorization" : "Bearer " + localStorage.getItem("apiToken"),
            "Accept" : "application/json",
        }
    });

    $.ajax({
        url : "{{$apiRoute}}/pengajuan",
        method : "POST",
        data :data,
        contentType : false,
        cache : false,
        processData : false,

        success : (res)=>{
            Swal.fire({
                title : res.status == 200 ? "Berhasil" : "Error",
                icon : res.status == 200 ? "success" : "error",
                text : res.message,
            });
        },
        error : (err)=>{
            Swal.fire({
                title : "Gagal",
                icon  : "error",
                text : err.status==422 ? "Data tidak boleh kosong !" : err.statusText,
            });
        }
    });
}


</script>