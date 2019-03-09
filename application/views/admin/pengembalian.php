<!DOCTYPE html>
<html lang="en">

  <head>
  <?php $this->load->view("admin/_partials/head.php") ?>
  </head>

  <body id="page-top">
    
  <!-- Navbar-->
  <?php $this->load->view("admin/_partials/navbar.php") ?>

    <div id="wrapper">

      <!-- Sidebar-->
      <?php $this->load->view("admin/_partials/sidebar.php") ?>
      <div id="content-wrapper">

        <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Daftar Alat yang ingin dikembalikan siswa</div>
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
                    <th>Waktu Pengembalian</th>
                    <th>Ket.</th>
                    <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php foreach ($pengembalian as $pengembalians): ?>       
                <tr>
                    <td><?php echo $pengembalians->nama_alat ?></td>
                    <td><?php echo $pengembalians->jumlah_pinjam ?></td>
                    <td><?php echo $pengembalians->nama ?></td>
                    <td><?php echo $pengembalians->penanggung_jawab ?></td>
                    <td><?php echo $pengembalians->tanggal_peminjaman ?></td>
                    <td><?php echo $pengembalians->tanggal_pengembalian ?></td>
                    <td><?php echo $pengembalians->ket ?></td>
                    <td style="text-align: center;">
                    <a onclick="konfirmasiPengembalian('<?php echo site_url('admin/submit_pengembalian/'
                        .$pengembalians->id_peminjaman) ?>')" 
                        class="btn btn-primary submit" type="submit "title="OK" style="color:white;" href="#">
                        <i class="fa fa-thumbs-up"></i></a></td>
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
            <?php $this->load->view("admin/_partials/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <!-- Modal-->
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <!-- Js-->
    <?php $this->load->view("admin/_partials/js.php") ?>

    <script>
    function konfirmasiPengembalian(url){
       $('#btn-delete-pengembalian').attr('href', url);
       $('#pengembalianModal').modal();
     }
    </script>

</body>

</html>