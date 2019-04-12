<!DOCTYPE html>
<html lang="en">

  <head>
  <?php $this->load->view("aspiran/_partials/head.php") ?>
  </head>

  <body id="page-top">
    
  <!-- Navbar-->
  <?php $this->load->view("aspiran/_partials/navbar.php") ?>

    <div id="wrapper">

      <!-- Sidebar-->
      <?php $this->load->view("aspiran/_partials/sidebar.php") ?>
      <div id="content-wrapper">

        <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Daftar Histori Peminjaman</div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>Alat</th>
                    <th>Jumlah</th>
                    <th>Nama Siswa</th>
                    <th>Penanggung Jawab</th>
                    <th>Waktu Pinjam</th>
                    <th>Waktu Kembali</th>
                    <th>Ket.</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($history as $historys): ?>       
                <tr>
                    <td><?php echo $historys->nama_alat ?></td>
                    <td><?php echo $historys->jumlah_pinjam ?></td>
                    <td><?php echo $historys->siswa ?></td>
                    <td><?php echo $historys->guru ?></td>
                    <td><?php echo $historys->tanggal_peminjaman ?></td>
                    <td><?php echo $historys->tanggal_pengembalian ?></td>
                    <td><?php echo $historys->ket ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer small text-muted">Page rendered in <strong>{elapsed_time}</strong> seconds. 
                 <?php //echo "Sekarang waktu menunjukkan pukul ", date("h:i A"), date(" l, d F Y");?>
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <?php $this->load->view("aspiran/_partials/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view("aspiran/_partials/scrolltop.php") ?>
    <!-- Modal-->
    <?php $this->load->view("aspiran/_partials/modal.php") ?>
    <!-- Js-->
    <?php $this->load->view("aspiran/_partials/js.php") ?>

    <script>
    function konfirmasiPengembalian(url){
       $('#btn-delete-pengembalian').attr('href', url);
       $('#pengembalianModal').modal();
     }
    </script>

</body>

</html>