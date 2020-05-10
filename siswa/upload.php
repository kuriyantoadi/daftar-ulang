<?php
include '../koneksi.php';

$id = $_POST['id'];
$no_p = $_POST['no_p'];
$username = $_POST['username'];

if ($_POST['upload']) {
    $ekstensi_diperbolehkan  = array('pdf');
    $pdf_daftar_ulang_up = "pdf_daftar_ulang";
    $pdf_daftar_ulang = $_FILES['pdf_daftar_ulang']['name'];
    $x = explode('.', $pdf_daftar_ulang);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['pdf_daftar_ulang']['size'];
    $file_tmp = $_FILES['pdf_daftar_ulang']['tmp_name'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 544070) {
            move_uploaded_file($file_tmp, 'upload_pdf/'.$no_p.'-'.'daftar_ulang.pdf');
        } else {
            // echo 'UKURAN FILE TERLALU BESAR';
            header("location:index.php?username=$username&pesan=ukuran_file_besar");
        }
    } else {
        echo 'File SKHUN tidak pdf';
        echo "<br>";
        // echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
        header("location:index.php?username=$username&pesan=jenis_file_salah");
        exit;
    }
}

$tgl_upload = date('d-m-Y');

mysqli_query($koneksi, "UPDATE t_siswa SET
           id='$id',
           pdf_daftar_ulang='$no_p-daftar_ulang.pdf',
           tgl_upload='$tgl_upload'

           where id='$id'
           ");

header("location:index.php?username=$username");
