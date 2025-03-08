<?php
if (!isset($_SESSION['hak_akses']) || $_SESSION['hak_akses'] !== 'admin') {
    header('Location: ' . BASEURL . '/buku');
    exit();
}
?>
<div class="container my-5">
    <?php Flasher::flash();?>
    <h2 class="text-center mb-4">Daftar Pegawai</h2>

    <?php if (isset($_SESSION['hak_akses']) && $_SESSION['hak_akses'] === 'admin'): ?>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal">Tambah Pegawai</button>
        <?php endif; ?>

    <div class="row">
        <?php foreach ($data['pegawai'] as $pegawai): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow border-0" style="border-radius: 10px; overflow: hidden;">
                    <div class="card-img-top-container" style="height: 200px; overflow: hidden;">
                        <img src="<?= BASEURL; ?>/img/pegawai/<?= $pegawai['gambar_pegawai']; ?>" alt="<?= $pegawai['nama']; ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-2" style="color: #007bff; font-weight: bold;"><?= $pegawai['nama']; ?></h5>
                        <p class="text-muted mb-1">ID: <?= $pegawai['id_pegawai']; ?></p>
                        <p class="card-text text-secondary"><strong>Jabatan:</strong> <?= $pegawai['hak_akses']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Pegawai</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="<?= BASEURL; ?>/Pegawai/tambah" method="post" enctype="multipart/form-data">
      
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama Pegawai">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Masukan Username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Masukan Password">
        </div>
        <div class="mb-3">
            <label for="hak_akses" class="form-label">Hak Akses</label>
            <select id="hak_akses" name="hak_akses" class="form-control">
                <option value="petugas">Petugas</option>
                <option value="admin">Admin</option>
                
            </select>
        </div>
        
        <div class="mb-3">
            <label for="gambar_pegawai" class="form-label">Foto Pegawai</label>
            <input type="file" id="gambar_pegawai" name="gambar_pegawai" class="form-control" accept="image/*">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Pegawai</button>
        </form>
      </div>
    </div>
  </div>
</div>


<style>
    
.card {
    transition: transform 0.3s, box-shadow 0.3s;
    border-radius: 10px;
}

.card:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.card-title {
    font-size: 1.2rem;
    color: #007bff;
}

.card-img-top-container img {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
</style>
