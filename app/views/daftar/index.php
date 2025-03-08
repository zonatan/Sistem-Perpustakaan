<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Universitas Negeri Manado</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #005bea, #00c6fb);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: white;
        }
        .container {
            text-align: center;
            max-width: 600px;
            background: rgba(255, 255, 255, 0.1);
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-register {
            background-color: #ffc107;
            color: #333;
            font-weight: bold;
            font-size: 1.2rem;
            padding: 10px 20px;
            border-radius: 50px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-register:hover {
            background-color: #e0a800;
            transform: scale(1.05);
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Perpustakaan Universitas Negeri Manado</h1>
        <p>Selamat datang di perpustakaan kami. Bergabunglah dan akses berbagai koleksi buku serta sumber belajar lainnya.</p>
        <a href="http://localhost/perpustakaanA2/public/daftar/form" class="btn btn-register mt-4">Daftar Menjadi Member</a>
    </div>
    <script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
    
</body>
</html>
