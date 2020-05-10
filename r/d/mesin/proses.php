<?php
// koneksi database
include '../../../koneksi.php';


session_start();
if ($_SESSION['status']!="mesin") {
    header("location:index.php?pesan=belum_login");
} else {
    $id = $_GET['id'];
    $kondisi = $_GET['kondisi'];

    //tampil database untuk hapus pdf
    $data = mysqli_query($koneksi, "select pdf_daftar_ulang
    from t_siswa where id='$id'");
    while ($d = mysqli_fetch_array($data)) {
        $del_pdf_daftar_ulang = $d['pdf_daftar_ulang'];
        // echo "$del_pdf_daftar_ulang";

        if ($kondisi == "daftar_ulang_tolak") {
            mysqli_query($koneksi, "UPDATE t_siswa SET
             kondisi='Harap Ulangi Daftar Ulang',
             pdf_daftar_ulang=''
             where id='$id'
             ");
            //hapus file
            unlink("../../../siswa/upload_pdf/".$del_pdf_daftar_ulang);

            header("location:index.php");
        } else {
            mysqli_query($koneksi, "UPDATE t_siswa SET
               kondisi='Daftar Ulang Selesai'
               where id='$id'
               ");
            header("location:index.php");
        }
    }//tutup peruluangan tampil database
}//else session
