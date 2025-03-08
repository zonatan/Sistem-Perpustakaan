

<div class="container my-5">
    <?php Flasher::flash(); ?>
    <h2 class="text-center mb-4">Daftar Member</h2>
    <div class="col-lg-6"></div>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal" onclick="resetForm()">
        Tambah Member
    </button>
    <table class="table table-bordered table-striped" id="member">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>No HP</th>
                <th style="width: 22%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
             foreach ($data['member'] as $member): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td class="text-center">
                            <img src="<?= BASEURL;?>/img/member/<?= $member['gambar_member']; ?>" alt="<?= $member['nama']; ?>" width="50">
                        </td>
                    <td><?= $member['nama']; ?></td>
                    <td><?= $member['no_hp']; ?></td>
                    <td >
                    <a href="<?= BASEURL; ?>/Member/detail/<?= $member['id_member']; ?>" class="btn btn-info w-30 ">Detail</a>
                    <a href="<?= BASEURL; ?>/Member/hapus/<?= $member['id_member']; ?>" class="btn btn-danger w-30" onclick="return confirm('Apakah anda yakin ingin menghapus member <?= $member['nama']; ?>?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="memberForm" action="<?= BASEURL; ?>/member/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id_member" name="id_member">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukan Alamat">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="number" id="no_hp" name="no_hp" class="form-control" placeholder="Masukan HP">
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <input type="text" id="fakultas" name="fakultas" class="form-control" placeholder="Masukan Fakultas">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan" class="form-control" placeholder="Masukan Jurusan">
                    </div>
                    <div class="mb-3">
                        <label for="gambar_member" class="form-label">Gambar Member</label>
                        <input type="file" id="gambar_member" name="gambar_member" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

