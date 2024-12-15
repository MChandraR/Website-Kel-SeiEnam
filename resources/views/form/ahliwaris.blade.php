<link rel="stylesheet" href="{{asset('css/ahliwaris.css')}}">


<div>
    <div class="form-area">
        <!-- <div class="preview">
            <iframe src="/template/{{$pengajuan}}" frameborder="0"></iframe>
        </div> -->
        <div>
            <h3>Data Permohonan</h3>
            <hr>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masukkan Nama Pemohon : </label>
                <input type="text" class="form-control" id="namaPemohon" placeholder="Masukkan nama lengkap yang mewarisi">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masukkan No.Whatsapp: </label>
                <input type="number" class="form-control" id="noWhatsapp" placeholder="Masukkan nomor whatsapp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masukkan Tanggal Meninggal : </label>
                <input type="date" class="form-control" id="tglMeninggal" placeholder="Masukkan nama lengkap yang mewarisi">
            </div>
        
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor Akte Kematian : </label>
                <input type="text" class="form-control" id="noAkteKematian" placeholder="Masukkan nomor akte kematian">
            </div>
        
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor KK  : </label>
                <input type="text" class="form-control" id="noKK" placeholder="Masukkan nomor kartu keluarga">
            </div>

        </div>
        
        <div>
            <div id="terwaris-list">
                
            </div>
            
            <div class="button-area">
                <button class="btn btn-primary" id="tambah-waris">Tambah Lagi</button>
                <button class="btn btn-danger" id="kurang-waris">Kurangi</button>
            </div>
        </div>
    </div>

    <center>
        <br><br><br>
        <button class="btn btn-primary btn-ajukan" onClick="addPengajuan()">Ajukan Surat</button>
    </center>
   
</div>

<script>

let kurangWaris = document.getElementById("kurang-waris");
let tambahWaris = document.getElementById("tambah-waris");
let warisList = document.getElementById("terwaris-list");
let counter = 0;

function addAhliWaris(){
    counter++;
    warisList.innerHTML += `
    <div>
        <h3>Data Ahli Waris ${counter}</h3>
        <hr>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Masukkan Nama Lengkap Pewaris ${counter} : </label>
            <input type="text" class="form-control"  placeholder="Masukkan nama lengkap yang mewarisi">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Masukkan Tgl.Lahir Pewaris ${counter} : </label>
            <input type="date" class="form-control" placeholder="Masukkan tgl lahir">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Masukkan NIK Lengkap Pewaris  ${counter} : </label>
            <input type="number" class="form-control"  placeholder="Masukkan nik yang mewarisi">
        </div>
        <br>
    </div>
    `;
}

tambahWaris.addEventListener('click', (e)=>{
    e.preventDefault();
    addAhliWaris();
});



kurangWaris.addEventListener('click', (e)=>{
    e.preventDefault();
    let child = warisList.children;
    counter = Math.max(0, counter-1);
    warisList.removeChild(warisList.lastElementChild);
    console.log(child);
});


function addPengajuan(){
    let ahliwaris = [];
    let children = warisList.children;
    for(let child in children){
        if(Number.isInteger(parseInt(child))){
            ahliwaris.push({
                nama  : children[child].children[2].children[1].value,
                tgl_lahir  : children[child].children[3].children[1].value,
                nik  : children[child].children[4].children[1].value,
            });
           
        }
    }
    console.log(ahliwaris);

    $.ajaxSetup({
        headers : {
            "Authorization" : "Bearer " + localStorage.getItem("apiToken"),
            "Accept" : "application/json"
        }
    });

    $.ajax({
        url : "{{$apiRoute}}/pengajuan",
        method : "POST",
        data :{
            tipe : "aw",
            pemohon : $("#namaPemohon")[0].value,
            no_whatsapp : $("#noWhatsapp")[0].value,
            tgl_meninggal : $("#tglMeninggal")[0].value,
            no_kartu_keluarga : $("#noKK")[0].value,
            no_akte_kematian : $("#noAkteKematian")[0].value,
            ahli_waris : ahliwaris
        },


        success : (res)=>{
            console.log(res);
        },
        error : (err)=>{
            console.log(err.statusText);
        }
    });
}

addAhliWaris();

</script>