<?php 
    include "koneksi.php";
    $db = new koneksi;
    $id = $_GET['id'];
    $db->hapustransaksi($id);
    header("location: transaksi.php", true, 301);
?>