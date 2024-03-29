<?php 
    include "koneksi.php";
    $db = new koneksi;
    $id = $_GET['id'];
    $db->hapusberas($id);
    header("location: dashboard.php", true, 301);
?>