<div class="container my-5">
    <h2 class="mb-4 text-center">Tambah Peminjam Buku</h2>

    <?php if (isset($_SESSION['id_peminjaman'])): ?>
        <div class="alert alert-success text-center">
            <h4>Peminjaman Berhasil!</h4>
            <p>ID Peminjaman adalah: <strong><?= $_SESSION['id_peminjaman']; ?></strong></p>
        </div>
        <?php unset($_SESSION['id_peminjaman']); ?>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="<?= BASEURL; ?>/peminjaman/tambah" method="POST">
                
                <script>
                    $(document).ready(function() {
                        $('.form-control').select2();
                    });
                </script>

                <div class="form-group mb-3">
                    <label for="id_buku">Buku 1:</label>
                    <select id="id_buku" name="id_buku" class="form-control" required>
                        <option value="">Pilih Buku</option>
                        <?php foreach ($data['buku'] as $b): ?>
                            <option value="<?= $b['id_buku']; ?>"><?= $b['id_buku']; ?> - <?= $b['judul']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="id_buku_2">Buku 2:</label>
                    <select id="id_buku_2" name="id_buku_2" class="form-control">
                        <option value="">Pilih Buku</option>
                        <?php foreach ($data['buku'] as $b): ?>
                            <option value="<?= $b['id_buku']; ?>"><?= $b['id_buku']; ?> - <?= $b['judul']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="id_buku_3">Buku 3:</label>
                    <select id="id_buku_3" name="id_buku_3" class="form-control">
                        <option value="">Pilih Buku</option>
                        <?php foreach ($data['buku'] as $b): ?>
                            <option value="<?= $b['id_buku']; ?>"><?= $b['id_buku']; ?> - <?= $b['judul']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="id_member">Nama Member:</label>
                    <select id="id_member" name="id_member" class="form-control">
                        <option value="">Pilih Member</option>
                        <?php foreach ($data['member'] as $m): ?>
                            <option value="<?= $m['id_member']; ?>"><?= $m['id_member']; ?> - <?= $m['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div id="biodata_member" class="mt-3">
                </div>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <input type="hidden" name="id_pegawai" value="<?= $_SESSION['user_id']; ?>">
                <?php endif; ?>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Pinjam Buku <i class="fas fa-book"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function() {
        const idBuku2 = document.getElementById('id_buku_2');
        const idBuku3 = document.getElementById('id_buku_3');
        
        if (idBuku2.value === '') {
            idBuku2.value = null;
        }
        if (idBuku3.value === '') {
            idBuku3.value = null;
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#id_member').change(function() {
            var memberId = $(this).val();
            if (memberId) {
                $.ajax({
                    url: '<?= BASEURL; ?>/member/getBiodata',
                    type: 'POST',
                    data: { id_member: memberId },
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            $('#biodata_member').html(`
                                <div class="card p-3">
                                    <p><img src="<?= BASEURL;?>/img/member/${data.gambar_member}" alt="Foto Member" class="img-thumbnail" style="width: 100px;"></p>
                                    <p><strong>Nama:</strong> ${data.nama}</p>
                                    <p><strong>Alamat:</strong> ${data.alamat}</p>
                                    <p><strong>No Telepon:</strong> ${data.no_hp}</p>
                                    <p><strong>Fakultas:</strong> ${data.fakultas}</p>
                                    <p><strong>Jurusan:</strong> ${data.jurusan}</p>
                                </div>
                            `);
                        } else {
                            $('#biodata_member').html('<p>Biodata tidak ditemukan.</p>');
                        }
                    }
                });
            } else {
                $('#biodata_member').html('');
            }
        });
    });
</script>
