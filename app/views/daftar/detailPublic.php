<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member</title>
    <link rel="stylesheet" href="http://localhost/perpustakaanA2/public/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/perpustakaanA2/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/perpustakaanA2/public/css/dataTables.bootstrap5.css">
    <style>
        .flasher-container {
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
        }
        .card {
            margin-top: 70px;
        }

        body {
    display: flex;
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #e0e5ec;
    min-height: 100vh;
    overflow-x: hidden;
}
        
    </style>
</head>
<body>

<div class="container mt-5 d-flex justify-content-center position-relative">
    <div class="position-absolute flasher-container" style="top: 2px;">
        <?php Flasher::flash(); ?> 
    </div>

    <div class="card shadow-lg p-4 mb-5 bg-white rounded text-center" style="width: 24rem; border: 1px solid #007bff;">
        <div class="card-body">

            <p class="text-uppercase text-primary fw-semibold mb-4" style="letter-spacing: 0.5px; font-size: 0.9rem;">
                Member Perpustakaan Universitas Negeri Manado
            </p>

            <img src="<?= BASEURL; ?>/img/member/<?= $data['member']['gambar_member']; ?>" 
                 alt="<?= $data['member']['nama']; ?>" 
                 class="rounded-circle mb-3" 
                 style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #007bff;">

            <h5 class="card-title fw-bold text-primary"><?= $data['member']['nama']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted">ID: <?= $data['member']['id_member']; ?></h6>

            <div class="text-start mt-4">
                <p class="card-text"><strong>No HP:</strong> <?= $data['member']['no_hp']; ?></p>
                <p class="card-text"><strong>Fakultas:</strong> <?= $data['member']['fakultas']; ?></p>
                <p class="card-text"><strong>Jurusan:</strong> <?= $data['member']['jurusan']; ?></p>
                <p class="card-text"><strong>Alamat:</strong> <?= $data['member']['alamat']; ?></p>
                <p class="card-text"><strong>Tanggal Daftar:</strong> <?= date('d F Y', strtotime($data['member']['tanggal_daftar'])); ?></p>
            </div>

            <div class="d-flex justify-content-around mt-4">
                <a href="<?= BASEURL; ?>/daftar/form" class="btn btn-outline-primary hide-on-screenshot">Kembali</a>
                <button id="downloadJpgBtn" class="btn btn-success hide-on-screenshot">Download JPG</button>
            </div>
        </div>
    </div>
</div>


<script src="http://localhost/perpustakaanA2/public/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script>
document.getElementById("downloadJpgBtn").addEventListener("click", function () {
    const cardElement = document.querySelector(".card");
    const buttons = document.querySelectorAll(".hide-on-screenshot");

    buttons.forEach(button => button.style.display = "none");

    html2canvas(cardElement).then(canvas => {
        const imgData = canvas.toDataURL("image/jpeg");

        const downloadLink = document.createElement("a");
        downloadLink.href = imgData;
        downloadLink.download = "kartu_member.jpg";  

        downloadLink.click();

        buttons.forEach(button => button.style.display = "inline-block");
    });
});
</script>

</body>
</html>
