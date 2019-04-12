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
                    <i class="fas fa-edit"></i>
                    Daftar Tanggung Jawab</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>Nama Siswa</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Waktu Pinjam</th>
                            <th>Ket.</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <tbody><?php foreach($list as $lists): ?>
                            <tr>
                                <td><?php echo $lists->siswa ?></td>
                                <td><?php echo $lists->nama_alat ?></td>
                                <td><?php echo $lists->jumlah_pinjam ?></td>
                                <td><?php echo $lists->tanggal_peminjaman ?></td>
                                <td><?php echo $lists->ket ?></td>
                                <td><?php echo $lists->status ?></td>
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

</html>