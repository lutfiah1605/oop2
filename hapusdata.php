<?php 
    include "koneksi.php";
    $db = new koneksi;
    $id = $_GET['id'];
    $db->hapusberas($id);
    header("location: index.php", true, 301);
?>