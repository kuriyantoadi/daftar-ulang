<!-- Awal Modal -->
<div id="myModal<?php echo $d['id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- konten modal-->
    <div class="modal-content">
      <!-- heading modal -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tampilan Data Daftar Ulang Siswa</h4>
      </div>
      <!-- body modal -->
      <div class="modal-body">
        <p style="text-align: justify; font-size: 16px;">Nama Siswa &nbsp;&nbsp;&nbsp;: <?php echo $d['nama_siswa']; ?></p>
        <p style="text-align: justify; font-size: 16px; margin-bottom: 40px;">Kelas &emsp;&emsp;&emsp;&emsp;: <?php echo $d['kompetensi_keahlian']; ?></p>
        <a href="proses.php?id=<?php echo $d['id']; ?>&kondisi=daftar_ulang_terima" type="button" class="btn btn-success btn-md">Daftar Ulang Sesuai</a>
        <a href="proses.php?id=<?php echo $d['id']; ?>&kondisi=daftar_ulang_tolak" type="button" class="btn btn-danger btn-md">Daftar Ulang Tidak Sesuai</a>
        <embed style="margin-top: 40px;" src="../../../siswa/upload_pdf/<?php echo $d['pdf_daftar_ulang']; ?>" frameborder="0" width="100%" height="800px">
      </div>
      <!-- footer modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
      </div>
    </div>
  </div>
</div>
<!-- Akhir modal -->
