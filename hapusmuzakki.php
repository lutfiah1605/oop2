<?php 
    include "koneksi.php";
    $db = new koneksi;
    $id_muzakki = $_GET['id'];
    $db->hapusmuzakki($id_muzakki);
    header("location: muzakki.php", true, 301);
?>