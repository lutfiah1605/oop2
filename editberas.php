<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles4.css">
    <title>Edit Data</title>
</head>
<body>

    <?php 
        include "koneksi.php";
        $db = new koneksi;
        $id = $_GET['id'];
        $query = "select * from beras where id = '$id'";
        $no = 1;
        foreach ($db->tampilData($query) as $row) {    
    ?>
    <form action="" name="edit" method="post">
        <div class="card col-6 mt-2 ms-2">
            <div class="card-header" style="font-size: 25px; text-align: center; font-weight: bold; color: white;">
                Edit Data Beras 
            </div>
            <div class="card-body" style="height: 300px;">
                <div class="mb-3">
                    <label class="form-label" style="font-size: 20px; color : white; padding : 2px;">Harga/Liter</label>
                    <input type="text" name="harga_ltr" id="harga_ltr" class="form-control" onchange="total()" value="<?php echo $row['harga_ltr']; ?>" style="width: 480px;">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 20px; color : white;">Harga/Jiwa</label>
                    <input type="text" name="harga_jiwa" id="harga_jiwa" class="form-control" value="<?php echo $row['harga_jiwa']; ?>" readonly style="width: 480px;">
                </div>
                <div class="mb-3">
                    <input type="submit" name="simpan" value="simpan" class="btn btn-info">
                    <input type="reset" name="hapus" value="hapus" class="btn btn-secondary">
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        function total() {
            var harga_ltr = document.getElementById('harga_ltr').value;

            var harga_jiwa = harga_ltr * 3.5;

            document.getElementById('harga_jiwa').value = harga_jiwa;
        }
    </script>
    <?php } 
          if (isset($_POST['simpan'])) {
            $harga_ltr = $_POST['harga_ltr'];
            $harga_jiwa = $_POST['harga_jiwa'];
            $db->editberas($harga_ltr, $harga_jiwa, $id);
            header("location: databeras.php", true, 301);
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>