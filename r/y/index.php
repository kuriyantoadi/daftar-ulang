<?php
  session_start();
  if ($_SESSION['status']!="admin") {
      header("location:../../index.php?pesan=belum_login");
  }

  echo "admin";
