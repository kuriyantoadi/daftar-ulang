<?php
  session_start();
  if ($_SESSION['status']!="siswa") {
      header("location:../index.php?pesan=belum_login");
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>PPDB SMKN 1 Kragilan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- <script src="../js/jquery.min.js"></script> -->
  <script src="../js/jquery-lastest.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <center><img style="margin-top: 25px;" src="../images/logo-banten.png" />
        </div>
        <div class="col-md-6">
          <center>
            <h2 style="margin-top:  25px;"><b>SMK Negeri 1 Kragilan</b></h2>
          </center>
          <center>
            <h4><b>Form Daftar Ulang</b></h4>
          </center>
          <center>
            <h4><b>Peserta Didik Baru</b></h4>
          </center>
          <center>
            <h5><b>Tahun Pelajaran 2020/2021</b></h4>
          </center>

          <!-- font ganti jenis -->
        </div>
        <div class="col-md-3">
          <center><img style="margin-bottom:  80px; margin-top:  25px;" class="img-fluid" alt="Bootstrap Image Preview" src="../images/logo-smkn1.png" />
        </div>
      </div>
    </div>


    <table class="table table-bordered">

      <?php
      include '../koneksi.php';
      $username = $_GET['username'];
      $data = mysqli_query($koneksi, "select
      id,
      username,
      no_p,
      nama_siswa,
      kompetensi_keahlian,
      asal_sekolah,
      pdf_daftar_ulang,
      file_download,
      status,
      kondisi,
      info

       from t_siswa where username='$username'");
      while ($d = mysqli_fetch_array($data)) {
          ?>


          <div>
            <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "ukuran_file_besar") {
                            echo "
                <div class='alert alert-danger' role='alert'>
                  <center>Maaf ukuran file maksimal 500 KB
                </div>";
                        } elseif ($_GET['pesan'] == "jenis_file_salah") {
                            echo "
                <div class='alert alert-danger' role='alert'>
                  <center>Maaf file yang anda inputkan bukan file PDF, mohon untuk mengunakan file pdf
                </div>";
                        }
                    } ?>


          </div>

      <table class="table table-bordered">
        <tr>
          <td>Nomor Pendaftaran</td>
          <td><?php echo $d['no_p']; ?></td>
        </tr>
        <tr>
          <td>Nama Siswa</td>
          <td><?php echo $d['nama_siswa']; ?></td>
        </tr>
        <tr>
          <td>Kompetensi Keahlian</td>
          <td><?php echo $d['kompetensi_keahlian']; ?></td>
        </tr>
        <tr>
          <td>Asal Sekolah</td>
          <td><?php echo $d['asal_sekolah']; ?></td>
        </tr>
        <tr>
          <td>Status Daftar Ulang</td>
          <td><?php echo $d['kondisi']; ?></td>
        </tr>
        <tr>
          <td>File Download</td>
          <td><a type="button" class="btn btn-info btn-sm" href="">Download File Daftar Ulang</td>
        </tr>
        <tr>
          <td>File Upload</td>
          <td>
          <?php
          if ($d['pdf_daftar_ulang'] == "") {
              ?>

              <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="text" name="no_p" value="<?php echo $d['no_p']; ?>" hidden>
                <input type="text" name="id" value="<?php echo $d['id']; ?>" hidden>
                <input type="text" name="username" value="<?php echo $d['username']; ?>" hidden>
                <input type="file" name="pdf_daftar_ulang" accept="application/pdf" class="form-control-file-sx" id="upload_file" required><br>
                <button type="submit" name="upload" value="upload" class="btn btn-success btn-sm" >upload</button>
              </form>

          <?php
          } else {
              ?>
          <embed src="upload_pdf/<?php echo $d['pdf_daftar_ulang']; ?>" type="application/pdf" width="100%" height="960">

          <?php
          } ?>

          </td>
        </tr>
        <tr>
          <td colspan="2">
            <p>
              <b>Informasi : <?php echo $d['info']; ?></b>
            <ol>

            </ol>
            </p>
          </td>
        </tr>
      </table>

      <center>
        <?php
      } ?>
        <br><br><br>

  </div>
  </div>
  </div>
  </div>

  <script>
    var uploadField = document.getElementById("upload_file");
    uploadField.onchange = function() {
      if (this.files[0].size > 500000) {
        alert("Maaf ukuran file pdf akta anda melebihi 500 KB");
        this.value = "";
      };
    };
  </script>


</body>

</html>
