<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>/js/dataTables.js"></script>
<script src="<?= BASEURL; ?>/js/dataTables.bootstrap5.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
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



<script>
  new DataTable('#buku');

  new DataTable('#member');

  new DataTable('#peminjaman');

  new DataTable('#riwayat');
</script>


</body>
</html>