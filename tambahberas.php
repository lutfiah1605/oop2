<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tambah Data Beras</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form action="" name="tambah" method="post">
                <div class="col-6"><label for=""> Harga/Ltr</label></div>
                <div class="col-6"> <input type="text" name="harga_ltr" id="harga_ltr" onchange="total()"></div>

                <div class="col-6"><label for="">Harga/Jiwa</label></div>
                <div class="col-6"><input type="text" name="harga_jiwa" id="harga_jiwa" readonly></div>

                <div class="col-6 mt-2"><input type="submit" name="simpan" value="simpan"> <input type="reset"
                        value="hapus"></div>
            </form>

        </div>
    </div>
    <script type="text/javascript">
        function total() {
            var harga_ltr = document.getElementById('harga_ltr').value;

            var harga_jiwa = harga_ltr * 3.5;

            document.getElementById('harga_jiwa').value = harga_jiwa;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <?php
    include "koneksi.php";
    $db = new koneksi;
    if (isset($_POST['simpan'])) {
        $harga_ltr = $_POST['harga_ltr'];
        $harga_jiwa = $_POST['harga_jiwa'];
        $db->tambahberas($harga_ltr, $harga_jiwa);
        header("location: dashboard.php", true, 301);
    }
    ?>
</body>

</html>