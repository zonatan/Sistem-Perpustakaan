<div class="container  my-5">
<div class="row">
      <div class="col-lg-6"></div>
      <?php Flasher::flash();?>
    </div>
    <h2 class="text-center mb-4">Daftar Buku</h2>
    <?php if (isset($_SESSION['hak_akses']) && $_SESSION['hak_akses'] === 'admin'): ?>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Buku</button>
        <?php endif; ?>
    <table class="table table-bordered table-striped" id="buku">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul Buku</th>
                    <th>Kategori</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Sampul</th>
                    <?php if (isset($_SESSION['hak_akses']) && $_SESSION['hak_akses'] === 'admin'): ?><th style="width: 18%;">Aksi</th>
                    <?php endif; ?>
                    </tr>
            </thead>
            <tbody>
                <?php 
                $i=1;
                foreach ($data['buku'] as $buku): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><strong><?= $buku['judul']; ?></strong></td>
                        <td><?= $buku['kategori']; ?></td>
                        <td><?= $buku['penerbit']; ?></td>
                        <td><?= $buku['tahun']; ?></td>
                       
                        <td class="text-center">
                            <img src="<?= BASEURL;?>/img/<?= $buku['gambar_sampul']; ?>" alt="<?= $buku['judul']; ?>" width="50">
                        </td>
                        <?php if (isset($_SESSION['hak_akses']) && $_SESSION['hak_akses'] === 'admin'): ?>
                        <td>
                        <button type="button" 
                                class="btn btn-warning tampilModalUbah" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formUbah" 
                                data-id="<?= $buku['id_buku']; ?>"
                                data-judul="<?= $buku['judul']; ?>"
                                data-kategori="<?= $buku['kategori']; ?>"
                                data-penerbit="<?= $buku['penerbit']; ?>"
                                data-tahun="<?= $buku['tahun']; ?>"
                                data-gambar_sampul="<?= $buku['gambar_sampul']; ?>">
                            Ubah
                        </button>
                        <a href="<?= BASEURL; ?>/Buku/hapus/<?= $buku['id_buku']; ?>" class="btn btn-danger ml-2" onclick="return confirm('Apakah anda yakin ingin menghapus buku <?=$buku['judul']?>?');">Hapus</a> 
                    </td>
                    <?php endif; ?>
                    </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div>
</div>




<!-- Modal Tambah -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="<?= BASEURL; ?>/Buku/tambah" method="post" enctype="multipart/form-data">
      
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" id="judul" name="judul" class="form-control" placeholder="Masukan Judul">
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" id="kategori" name="kategori" class="form-control" placeholder="Masukan Kategori">
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" class="form-control" placeholder="Masukan Penerbit">
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" id="tahun" name="tahun" class="form-control" placeholder="Masukan Tahun Diterbitkan" min="1800" max="2100">
        </div>
        
        <div class="mb-3">
            <label for="gambar_sampul" class="form-label">Foto Sampul</label>
            <input type="file" id="gambar_sampul" name="gambar_sampul" class="form-control" accept="image/*">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Buku</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal formUbah -->
<div class="modal fade" id="formUbah" tabindex="-1" aria-labelledby="judulUbah" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulUbah">Ubah Buku</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="<?= BASEURL; ?>/Buku/ubah" method="post" enctype="multipart/form-data">
          
          <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">

          <div class="mb-3">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" id="judul" name="judul" class="form-control" value="<?= $buku['judul']; ?>" required>
          </div>

          <div class="mb-3">
              <label for="kategori" class="form-label">Kategori</label>
              <input type="text" id="kategori" name="kategori" class="form-control" value="<?= $buku['kategori']; ?>" required>
          </div>

          <div class="mb-3">
              <label for="penerbit" class="form-label">Penerbit</label>
              <input type="text" id="penerbit" name="penerbit" class="form-control" value="<?= $buku['penerbit']; ?>" required>
          </div>

          <div class="mb-3">
              <label for="tahun" class="form-label">Tahun</label>
              <input type="number" id="tahun" name="tahun" class="form-control" value="<?= $buku['tahun']; ?>" min="1800" max="2100" required>
          </div>

          <div class="mb-3">
              <label for="gambar_sampul" class="form-label">Foto Sampul</label>
              <input type="file" id="gambar_sampul" name="gambar_sampul" class="form-control" accept="image/*">
              <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
          </div>

          <!-- Input Hidden untuk Menyimpan Nama Gambar Lama -->
          <input type="hidden" name="gambar_sampul_lama" value="<?= $buku['gambar_sampul']; ?>">

          <div class="mb-3">
              <label class="form-label">Sampul Saat Ini</label>
              <div>
                  <img class="preview-img" src="<?= BASEURL; ?>/img/<?= $buku['gambar_sampul']; ?>" alt="<?= $buku['judul']; ?>" width="100">
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
    const buttons = document.querySelectorAll('.tampilModalUbah');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const id_buku = this.getAttribute('data-id');
            const judul = this.getAttribute('data-judul');
            const kategori = this.getAttribute('data-kategori');
            const penerbit = this.getAttribute('data-penerbit');
            const tahun = this.getAttribute('data-tahun');
            const gambar_sampul = this.getAttribute('data-gambar_sampul');

            document.querySelector('#formUbah input[name="id_buku"]').value = id_buku;
            document.querySelector('#formUbah input[name="judul"]').value = judul;
            document.querySelector('#formUbah input[name="kategori"]').value = kategori;
            document.querySelector('#formUbah input[name="penerbit"]').value = penerbit;
            document.querySelector('#formUbah input[name="tahun"]').value = tahun;
            document.querySelector('#formUbah img.preview-img').src = `<?= BASEURL; ?>/img/${gambar_sampul}`;
        });
    });
});
</script>
