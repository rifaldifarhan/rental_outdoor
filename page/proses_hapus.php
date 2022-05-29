<?php
include 'koneksi.php';
$id = $_GET["idalat"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM tblalat WHERE idalat='$id' ";
    $hasil_query = mysqli_query($koneksi, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='home.php?pg=data_alat';</script>";
    }