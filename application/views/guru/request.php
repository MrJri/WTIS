<!DOCTYPE html>
<html lang="en">

  <head>
  <?php $this->load->view("guru/_partials/head.php") ?>
  </head>

  <body id="page-top">
    
  <!-- Navbar-->
  <?php $this->load->view("guru/_partials/navbar.php") ?>

    <div id="wrapper">

      <!-- Sidebar-->
      <?php $this->load->view("guru/_partials/sidebar.php") ?>
      <div id="content-wrapper">

        <div class="container-fluid">

        <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Daftar Permintaan Siswa</div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Nama Siswa</th>
                        <th>Alat</th>
                        <th>Jumlah</th>
                        <th>Waktu Pinjam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($request as $requests): ?>
                        <tr>
                        <td><?php echo $requests->siswa?></td>
                        <td><?php echo $requests->nama_alat?></td>
                        <td><?php echo $requests->jumlah_pinjam?></td>
                        <td><?php echo $requests->tanggal_peminjaman?></td>
                        <td><?php echo $requests->status?></td>
                        <td><a onclick="izinkanConfirm('<?php echo site_url('guru/izinkan/'.$requests->id_peminjaman) ?>')" 
                                class="btn btn-primary btn-block submit" title="Izinkan!" style="color:white; width:100%;" href="#"><i class="fa fa-thumbs-up"></i> Izinkan</a>
                            <a onclick="deleteConfirm('<?php echo site_url('guru/tolak/'.$requests->id_peminjaman) ?>')" 
                                class="btn btn-danger btn-block submit" style="color:white; width:100%;" title="Tolak!" href="#"><i class="fa fa-trash"></i> Tolak</a></td></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php $this->load->view("guru/_partials/footer.php") ?>

      </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view("guru/_partials/scrolltop.php") ?>
    <!-- Modal-->
    <?php $this->load->view("guru/_partials/modal.php") ?>
    <!-- Js-->
    <?php $this->load->view("guru/_partials/js.php") ?>

</body>
    <script>
        function deleteConfirm(url){
            $('#btn-delete-peminjaman').attr('href', url);
            $('#hapuspeminjamanModal').modal();
        }
    
        function izinkanConfirm(url){
            $('#btn-izinkan').attr('href', url);
            $('#izinkanModal').modal();
        }
    </script>
</html>