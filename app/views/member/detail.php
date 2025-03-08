<div class="container mt-5 d-flex justify-content-center">
    <div class="position-absolute flasher-container" style="top: 2px;">
        <?php Flasher::flash(); ?> 
    </div>

    <!-- Kartu Member -->
    <div class="card shadow-lg p-4 mb-5 bg-white rounded text-center" style="width: 24rem; border: 1px solid #007bff;">
        <div class="card-body">

            <p class="text-uppercase text-primary fw-semibold mb-4" style="letter-spacing: 0.5px; font-size: 0.9rem;">
                Member Perpustakaan Universitas Negeri Manado
            </p>

            <img src="<?= BASEURL; ?>/img/member/<?= $data['member']['gambar_member']; ?>" 
                 alt="<?= $data['member']['nama']; ?>" 
                 class="rounded-circle mb-3" 
                 style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #007bff;">

            <h5 class="card-title fw-bold text-primary"><?= $data['member']['nama']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted">ID: <?= $data['member']['id_member']; ?></h6>

            <div class="text-start mt-4">
                <p class="card-text"><strong>No HP:</strong> <?= $data['member']['no_hp']; ?></p>
                <p class="card-text"><strong>Fakultas:</strong> <?= $data['member']['fakultas']; ?></p>
                <p class="card-text"><strong>Jurusan:</strong> <?= $data['member']['jurusan']; ?></p>
                <p class="card-text"><strong>Alamat:</strong> <?= $data['member']['alamat']; ?></p>
                <p class="card-text"><strong>Tanggal Daftar:</strong> <?= date('d F Y', strtotime($data['member']['tanggal_daftar'])); ?></p>
            </div>

            <div class="d-flex justify-content-around mt-4">
                <a href="<?= BASEURL; ?>/member" class="btn btn-outline-primary hide-on-screenshot">Kembali</a>
                <button type="button" class="btn btn-warning btn-ubah hide-on-screenshot" data-bs-toggle="modal" data-bs-target="#formUbah" 
                        data-id="<?= $data['member']['id_member']; ?>" 
                        data-nama="<?= $data['member']['nama']; ?>" 
                        data-alamat="<?= $data['member']['alamat']; ?>" 
                        data-no_hp="<?= $data['member']['no_hp']; ?>"
                        data-fakultas="<?= $data['member']['fakultas']; ?>" 
                        data-jurusan="<?= $data['member']['jurusan']; ?>" 
                        data-gambar_member="<?= $data['member']['gambar_member']; ?>">Ubah</button>
                <button id="downloadJpgBtn" class="btn btn-success hide-on-screenshot">Download JPG</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal formUbah -->
<div class="modal fade" id="formUbah" tabindex="-1" aria-labelledby="judulUbah" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulUbah">Ubah Member</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="<?= BASEURL; ?>/member/ubah" method="post" enctype="multipart/form-data">
          
          <input type="hidden" name="id_member" id="id_member">

          <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" id="nama" name="nama" class="form-control" required>
          </div>

          <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" id="alamat" name="alamat" class="form-control" required>
          </div>

          <div class="mb-3">
              <label for="no_hp" class="form-label">No HP</label>
              <input type="text" id="no_hp" name="no_hp" class="form-control" required>
          </div>

          <div class="mb-3">
              <label for="fakultas" class="form-label">Fakultas</label>
              <input type="text" id="fakultas" name="fakultas" class="form-control" required>
          </div>

          <div class="mb-3">
              <label for="jurusan" class="form-label">Jurusan</label>
              <input type="text" id="jurusan" name="jurusan" class="form-control" required>
          </div>

          <div class="mb-3">
              <label for="gambar_member" class="form-label">Foto Member</label>
              <input type="file" id="gambar_member" name="gambar_member" class="form-control" accept="image/*">
              <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
          </div>

          <input type="hidden" name="gambar_member_lama" id="gambar_member_lama">

          <div class="mb-3">
              <label class="form-label">Foto Saat Ini</label>
              <div>
                  <img class="preview-img" id="preview-img" src="" alt="Foto Member" width="100">
              </div>
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
      </div>
      
    </div>
  </div>
</div>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Pilih semua tombol yang memiliki kelas 'btn-ubah'
    const buttons = document.querySelectorAll('.btn-ubah');

    // Loop untuk menambahkan event listener ke setiap tombol
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            // Ambil data dari atribut 'data-*'
            const id_member = this.getAttribute('data-id');
            const nama = this.getAttribute('data-nama');
            const alamat = this.getAttribute('data-alamat');
            const no_hp = this.getAttribute('data-no_hp');
            const fakultas = this.getAttribute('data-fakultas');
            const jurusan = this.getAttribute('data-jurusan');
            const gambar_member = this.getAttribute('data-gambar_member');

            // Isi form di modal dengan data yang diambil
            document.getElementById('id_member').value = id_member;
            document.getElementById('nama').value = nama;
            document.getElementById('alamat').value = alamat;
            document.getElementById('no_hp').value = no_hp;
            document.getElementById('fakultas').value = fakultas;
            document.getElementById('jurusan').value = jurusan;
            document.getElementById('gambar_member_lama').value = gambar_member;
            document.getElementById('preview-img').src = `<?= BASEURL; ?>/img/member/${gambar_member}`;
        });
    });
});
</script>
