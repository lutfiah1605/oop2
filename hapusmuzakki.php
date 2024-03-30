<?php 
    include "koneksi.php";
    $db = new koneksi;
    $id_muzakki = $_GET['id_muzakki'];
    $db->hapusmuzakki($id_muzakki);
    header("location: muzakki.php", true, 301);
?>