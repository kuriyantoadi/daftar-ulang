<?php
// koneksi database
include '../../../koneksi.php';


session_start();
if ($_SESSION['status']!="mesin") {
    header("location:index.php?pesan=belum_login");
} else {
    $id = $_GET['id'];
    $kondisi = $_GET['kondisi'];

    if ($kondisi == "daftar_ulang_tolak") {
        mysqli_query($koneksi, "UPDATE t_siswa SET
             kondisi='Harap Ulangi Daftar Ulang',
             pdf_daftar_ulang=''
             where id='$id'
             ");
        header("location:index.php");
    } else {
        mysqli_query($koneksi, "UPDATE t_siswa SET
               kondisi='Daftar Ulang Selesai'
               where id='$id'
               ");
        header("location:index.php");
    }
}
