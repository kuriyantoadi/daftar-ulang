<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
// belum mengunakan MD5
$username = addslashes(trim($_POST['username']));
// $username = $_POST['username'];
$password = md5($_POST['password']);

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from t_siswa where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $login = mysqli_fetch_assoc($data);

    if ($login['status']=="siswa") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "siswa";
        // echo "ok";
        header("location:siswa/index.php?username=$username");
    } elseif ($login['kelas']=="admin") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "admin";
        header("location:jurusan/admin.php");
    } else {
        echo "salah1";
        header("location:index.php?pesan=gagal1");
    }
} else {
    echo "salah2";

    header("location:index.php?pesan=gagal");
}
