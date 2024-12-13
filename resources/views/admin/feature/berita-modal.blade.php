
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="exampleModalLabel">Detail Permohonan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body news-body" id="detailPengajuan">
        <img src="{{asset('assets/images/seienam.jpg')}}" alt="">

        <div class="detail-berita">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Id_Berita</label>
            <input type="text" class="form-control" id="idBerita" placeholder="" disabled>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="judulBerita" placeholder="">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Waktu</label>
            <input type="date" class="form-control" id="waktuBerita" placeholder="">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Konten Berita</label>
            <textarea type="date" class="form-control" id="kontenBerita" placeholder=""></textarea>
          </div>

      
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onClick="updateNews()">Simpan</button>
      </div>
    </div>
  </div>
</div>





<!-- Modal Add Berita -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="exampleModalLabel">Tambah Berita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body news-body" id="detailPengajuan">
        <img src="{{asset('assets/images/seienam.jpg')}}" alt="">

        <div class="detail-berita">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="judulBeritaAdd" placeholder="">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Waktu</label>
            <input type="date" class="form-control" id="waktuBeritaAdd" placeholder="">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Konten Berita</label>
            <textarea type="text" class="form-control" id="kontenBeritaAdds" placeholder=""></textarea>
          </div>

      
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onClick="addNews()">Simpan</button>
      </div>
    </div>
  </div>
</div>