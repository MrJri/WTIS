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
              <i class="fas fa-plus"></i>
              Daftar Alat yang ingin dipinjam siswa</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Alat</th>
                      <th>Jumlah</th>
                      <th>Nama Siswa</th>
                      <th>Penanggung Jwb</th>
                      <th>Waktu Pinjam</th>
                      <th>Ket.</th>
                      <th>Status</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                        <tr>
                            <td>Cisco 2960</td>
                            <td>2</td>
                            <td>M Farhan Madani</td>
                            <td>Trimans Yogiana</td>
                            <td>07.30</td>
                            <td>-</td>
                            <td>Menunggu admin</td>
                            <td style="text-align: center;"><a class="btn btn-danger submit" title="Tolak" style="color:white;" href="#"><i class="fa fa-trash"></i> </a>
                              <a class="btn btn-warning submit" title="Ket." style="color:white;" href="#"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-primary submit" title="Pinjamkan" style="color:white;" href="#"><i class="fa fa-thumbs-up"></i></a></td>
                          </tr>
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

    <!-- Scroll to Top Button-->
    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <!-- Modal-->
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <!-- Js-->
    <?php $this->load->view("admin/_partials/js.php") ?>

  </body>

</html>
