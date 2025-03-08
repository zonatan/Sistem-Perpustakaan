<div class="container my-5">
    <?php Flasher::flash(); ?>
    <h2 class="text-center mb-4">Riwayat</h2>
    <table class="table table-bordered table-striped" id="riwayat">
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th style="width: 70%;">Judul Buku</th>
                <th>Nama Member</th>
                <th>Nama Pegawai</th>
                <th>Status</th>
                <th>Denda</th>
                <?php if (isset($_SESSION['hak_akses']) && $_SESSION['hak_akses'] === 'admin'): ?>
                <th>Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['peminjaman'] as $buku): ?>
                <tr>
                    <td><?= $buku['id_peminjaman']; ?></td>
                    <td>
                        <strong>- </strong><?= $buku['judul_buku']; ?>
                        <?php if (!empty($buku['judul_buku_2'])): ?>
                        <br><strong>- </strong><?= $buku['judul_buku_2']; ?>
                    <?php endif; ?>
                    <?php if (!empty($buku['judul_buku_3'])): ?>
                        <br><strong>- </strong><?= $buku['judul_buku_3']; ?>
                    <?php endif; ?>
                    </td>
                    <td><?= $buku['nama_member']; ?></td>
                    <td><?= $buku['nama_pegawai']; ?></td>
                    <td><?= $buku['status']; ?></td>
                    <td><?php echo 'Rp. ' . number_format($buku['denda'], 2, ',', '.'); ?></td>

                    <?php if (isset($_SESSION['hak_akses']) && $_SESSION['hak_akses'] === 'admin'): ?>
                    <td>
                        <a href="<?= BASEURL; ?>/Peminjaman/hapus/<?= $buku['id_peminjaman']; ?>" class="btn btn-danger ml-2" onclick="return confirm('Apakah anda yakin ingin menghapus peminjaman <?=$buku['id_peminjaman']?>?');">hapus</a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
