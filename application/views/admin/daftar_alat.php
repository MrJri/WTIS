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
                  <i class="fas fa-table"></i>
                  Daftar Alat yang Tersedia</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Alat</th>
                      <th>Jenis</th>
                      <th>Jumlah Alat</th>
                      <th>Kondisi Alat</th>
                      <th>Status</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php foreach ($alat as $alats): ?>
                    <tr>
                      <td><?php echo $alats->nama ?></td>
                      <td><?php echo $alats->jenis ?></td>
                      <td><?php echo $alats->jumlah ?></td>
                      <td><?php echo $alats->kondisi ?></td>
                      <td><?php echo $alats->status ?></td>
                      <td style="text-align: center;"><a class="btn btn-success submit" title="Tambah Barang" style="color:white;" href="#"><i class="fa fa-plus"></i></a>
                        <a class="btn btn-danger submit" title="Hapus Barang" style="color:white;" href="#"><i class="fa fa-trash"></i></a>
                        <a class="btn btn-primary submit" title="Edit Barang" style="color:white;" href="#"><i class="fa fa-edit"></i></a></td>
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
    
  </body>

</html>