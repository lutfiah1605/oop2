<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="styles2.css">
    <title>Tambah Muzakki</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <form action="" name="tambah" method="post">
                <div class="mb-3 col-12">
                    <label class="form-label" style="font-size: 20px; color: white;">Nama</label>
                    <div class="col-6"> <input type="text" name="nama" id="nama" style="width: 620px;"></div>
                </div>
                <div class="mb-3 col-12">
                    <label class="col-6 form-label" style="font-size: 20px; color: white;">Alamat</label>
                    <div class="col-6"> <textarea name="alamat" id="alamat" cols="90" rows="10"></textarea></div>
                </div>
                <div class="col-6"><label class="form-label" style="font-size: 20px; color: white;">Jumlah
                        Jiwa</label>
                    <div class="col-6">
                        <select name="jml_jiwa" id="jml_jiwa"
                            style="width: 600px;">
                            <option value="">-Pilih-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                </div>
                <div class="col-6"><label class="form-label" style="font-size: 20px; color: white;">Harga
                        Beras</label>
                    <div class="col-6">
                        <select oninput="total()" name="id_beras" id="id_beras"
                            style="width: 600px;">
                            <option value="">-Pilih-</option>
                            <?php
                            include "koneksi.php";
                            $db = new koneksi;
                            $query = "select * from beras";
                            foreach ($db->tampilData($query) as $row) {
                                ?>

                                <option value="<?php echo $row['harga_ltr']; ?>">
                                    <?php echo $row['harga_ltr'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6"><label for="" style="font-size: 20px; color: white;">Tagihan</label></div>
                <div class="col-6"><input type="text" name="tagihan" id="tagihan" readonly style="width: 600px;"></div>
                <div class="col-6"><label for="" style="font-size: 20px; color: white;">Status</label></div>
                <div class="col-6">
                    <select name="status" id="status" style="width: 600px;">
                        <option value="">-Pilih-</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum">Belum</option>
                    </select>
                </div>

                <div class="col-6 mt-2">
                    <input type="submit" name="simpan" value="simpan"> <input type="reset" value="hapus">
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        function total() {
            var harga = document.getElementById('id_beras');
            var jiwa = document.getElementById('jml_jiwa');
            var total = (harga * 3.5) * jiwa;

            document.getElementById('tagihan').value = total;
        }
    </script>
    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jml_jiwa = $_POST['jml_jiwa'];
        $tagihan = $_POST['tagihan'];
        $status = $_POST['status'];
        $id_beras = $_POST['id_beras'];
        $db->tambahdata($nama, $alamat, $jml_jiwa, $tagihan, $status, $id_beras);
        header("location: muzakkitransaksi.php", true, 301);
    }
    ?>
</body>

</html>