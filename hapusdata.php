<?php 
    include "koneksi.php";
    $db = new koneksi;
    $id = $_GET['id'];
    $db->hapusberas($id);
    header("location: databeras.php", true, 301);
?>