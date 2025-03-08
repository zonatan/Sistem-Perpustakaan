<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Member - Perpustakaan UNIMA</title>
    <link rel="stylesheet" href="http://localhost/perpustakaanA2/public/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f6f8;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .btn-primary {
            width: 100%;
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <header>
        <h1>Perpustakaan Universitas Negeri Manado</h1>
        <p class="mb-0">Pendaftaran Member Baru</p>
    </header>

    <div class="container my-5">
        <h2 class="text-center mb-4">Formulir Pendaftaran</h2>
        <form action="http://localhost/perpustakaanA2/public/Daftar/tambahPublic" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="tel" id="no_hp" name="no_hp" class="form-control" placeholder="Masukkan nomor HP" required>
            </div>
            <div class="mb-3">
                <label for="fakultas" class="form-label">Fakultas</label>
                <input type="text" id="fakultas" name="fakultas" class="form-control" placeholder="Masukkan fakultas Anda" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" id="jurusan" name="jurusan" class="form-control" placeholder="Masukkan jurusan Anda" required>
            </div>
            <div class="mb-3">
                <label for="gambar_member" class="form-label">Foto Profil</label>
                <input type="file" id="gambar_member" name="gambar_member" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
        </form>
    </div>

    <footer class="text-center py-3 mt-5 text-muted">
        <p>&copy; 2024 Perpustakaan UNIMA. Semua hak dilindungi.</p>
    </footer>

    <script src="http://localhost/perpustakaanA2/public/js/bootstrap.bundle.min.js"></script>

</body>
</html>
