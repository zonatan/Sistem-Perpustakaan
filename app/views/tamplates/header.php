<?php
if (!isset($_SESSION['hak_akses']) || !in_array($_SESSION['hak_akses'], ['admin', 'petugas'])) {
    header('Location: ' . BASEURL . '/login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <script src="<?= BASEURL; ?>/js/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/st.css">
    <link href="<?= BASEURL; ?>/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="<?= BASEURL; ?>/select2/dist/js/select2.min.js"></script>

    

</head>
<body>
    <div class="sidebar">
        <a class="navbar-brand" href="<?= BASEURL; ?>">
            Perpustakaan<br>
            <span style="font-size: 1rem;">UNIMA</span>
        </a>
        <?php if (isset($_SESSION['nama'])): ?>
        <div class="navbar-user mb-5">
            <span>Welcome, <?= htmlspecialchars($_SESSION['nama']); ?></span>
        </div>
        <?php endif; ?>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?= (strpos($data['judul'], 'Daftar Buku') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/buku">
                    <i class="fas fa-user-graduate"></i> Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (strpos($data['judul'], 'Member') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/member">
                    <i class="fas fa-users"></i> Member
                </a>
            </li>
            <?php if (isset($_SESSION['hak_akses']) && $_SESSION['hak_akses'] === 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link <?= (strpos($data['judul'], 'Pegawai') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/pegawai">
                    <i class="fas fa-users"></i> Pegawai
                    </a>
                </li>
            <?php endif; ?>
          
            <li class="nav-item">
                <a class="nav-link <?= (strpos($data['judul'], 'Peminjaman') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/peminjaman">
                    <i class="fas fa-book"></i> Peminjaman
                </a>
            </li>
                <li class="nav-item">
                    <a class="nav-link <?= (strpos($data['judul'], 'Pengembalian') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/pengembalian">
                    <i class="fas fa-users"></i> Pengembalian
                    </a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (strpos($data['judul'], 'Riwayat') !== false) ? 'active' : ''; ?>" href="<?= BASEURL; ?>/peminjaman/bukumasuk">
                    <i class="fas fa-users"></i> Riwayat
                    </a>
                </li>    
            <br></br>
            <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/login/logout">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/login">Login</a>
                    </li>
                <?php endif; ?>
        </ul>
    </div>