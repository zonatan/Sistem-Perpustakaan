<div class="container my-5">

    <?php Flasher::flash(); ?>

    <h2 class="text-center mb-4">Daftar Peminjaman</h2>

    <?php if (isset($_SESSION['id_peminjaman'])): ?>
        <div class="alert alert-success text-center">
            <h4>Peminjaman Berhasil!</h4>
            <p>ID Peminjaman adalah: <strong><?= $_SESSION['id_peminjaman']; ?></strong></p>
        </div>
        <?php unset($_SESSION['id_peminjaman']); ?>
    <?php endif; ?>

    <div class="text-start mb-3">
        <a href="<?= BASEURL; ?>/peminjaman/form" class="btn btn-primary">Tambah Peminjam</a>
    </div>
    <table class="table table-bordered table-striped" id="peminjaman" style="table-layout: auto; width: 100%;">
        <thead class="table-dark">
            <tr>
                <th style="width: 5%;">ID Peminjaman</th>
                <th style="width: 70%;">Judul Buku</th>
                <th style="width: 30%;">Nama Member</th>
                <th style="width: 30%;">Nama Pegawai</th>
                <th style="width: 10%;">Tanggal Pinjam</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['peminjaman'] as $peminjaman): ?>
            <tr>
                <td><?= $peminjaman['id_peminjaman']; ?></td>
                <td>
                    <strong>- </strong><?= $peminjaman['judul_buku']; ?>
                    <?php if (!empty($peminjaman['judul_buku_2'])): ?>
                        <br><strong>- </strong><?= $peminjaman['judul_buku_2']; ?>
                    <?php endif; ?>
                    <?php if (!empty($peminjaman['judul_buku_3'])): ?>
                        <br><strong>- </strong><?= $peminjaman['judul_buku_3']; ?>
                    <?php endif; ?>
                </td>
                <td><?= $peminjaman['nama_member']; ?></td>
                <td><?= $peminjaman['nama_pegawai']; ?></td>
                <td><?= date("d-m-Y", strtotime($peminjaman['tanggal_pinjam'])); ?></td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
