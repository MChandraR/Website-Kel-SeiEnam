<link rel="stylesheet" href="{{asset('css/ahliwaris.css')}}">


<form action="">
    <div class="form-area">
        <!-- <div class="preview">
            <iframe src="/template/{{$pengajuan}}" frameborder="0"></iframe>
        </div> -->
        <div>
            <h3>Data Permohonan</h3>
            <hr>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masukkan Nama Pemohon : </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama lengkap yang mewarisi">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masukkan No.Whatsapp: </label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nomor whatsapp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masukkan Tanggal Meninggal : </label>
                <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama lengkap yang mewarisi">
            </div>
        
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor Akte Kematian : </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nomor akte kematian">
            </div>
        
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor KK  : </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nomor kartu keluarga">
            </div>

        </div>
        
        <div>
            <div id="terwaris-list">
                
            </div>
            
            <br>
            <button class="btn btn-primary" id="tambah-waris">Tambah Lagi</button>
            <button class="btn btn-danger" id="kurang-waris">Kurangi</button>
        </div>
    </div>
   
</form>

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
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nama lengkap yang mewarisi">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Masukkan Tgl.Lahir Pewaris ${counter} : </label>
            <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nim yang mewarisi">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Masukkan NIK Lengkap Pewaris  ${counter} : </label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan nim yang mewarisi">
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

addAhliWaris();

</script>