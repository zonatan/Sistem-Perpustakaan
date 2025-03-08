<div class="container my-5">
    <?php Flasher::flash(); ?>

    <h2 class="text-center mb-4">Pengembalian Buku</h2>

    <form action="<?= BASEURL; ?>/pengembalian/cari" method="POST" class="d-flex justify-content-center mb-4">
        <div class="input-group" style="max-width: 400px;">
            <input type="text" name="id_peminjaman" class="form-control" placeholder="Masukkan ID Peminjaman">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <?php if (isset($data['detail_peminjaman']) && !empty($data['detail_peminjaman'])): ?>
        <div class="card shadow mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Detail Peminjaman</h5>
            </div>
            <div class="card-body">
                <p><strong>ID Peminjaman:</strong> <?= $data['detail_peminjaman']['id_peminjaman']; ?></p>
                <p><strong>Buku 1:</strong> <?= $data['detail_peminjaman']['judul_buku']; ?></p>
                <?php if (!empty($data['detail_peminjaman']['judul_buku_2'])): ?>
                    <p><strong>Buku 2:</strong> <?= $data['detail_peminjaman']['judul_buku_2']; ?></p>
                <?php endif; ?>
                <?php if (!empty($data['detail_peminjaman']['judul_buku_3'])): ?>
                    <p><strong>Buku 3:</strong> <?= $data['detail_peminjaman']['judul_buku_3']; ?></p>
                <?php endif; ?>
                <p><strong>Nama Member:</strong> <?= $data['detail_peminjaman']['nama_member']; ?></p>
                <p><strong>Nama Pegawai:</strong> <?= $data['detail_peminjaman']['nama_pegawai']; ?></p>
                <p><strong>Tanggal Pinjam:</strong> <?= date("d-m-Y", strtotime($data['detail_peminjaman']['tanggal_pinjam'])); ?></p>
                <p><strong>Denda:</strong> <?= 'Rp. ' . number_format($data['detail_peminjaman']['denda'], 2, ',', '.'); ?></p>
                <p><strong>Status:</strong> 
                    <?= $data['detail_peminjaman']['status'] == 'dipinjam' ? 'Sedang Dipinjam' : 'Sudah Dikembalikan'; ?>
                </p>
                
                <?php if ($data['detail_peminjaman']['status'] == 'dipinjam'): ?>
                    <div class="text-end">
                        <a href="<?= BASEURL; ?>/pengembalian/kembalikan/<?= $data['detail_peminjaman']['id_peminjaman']; ?>" class="btn btn-success mt-3">
                            Kembalikan Buku
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php elseif (isset($_POST['id_peminjaman'])): ?>
        <div class="alert alert-danger mt-4 text-center">ID Peminjaman tidak ditemukan.</div>
    <?php endif; ?>
</div>
