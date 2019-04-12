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

          <!-- Breadcrumbs-->
          <!--<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>-->

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">Total Siswa <?php echo $total_siswa ?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('aspiran/siswa') ?>">
                  <span class="float-left">View Details!</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">Total Guru <?php echo $total_guru ?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('aspiran/guru') ?>">
                  <span class="float-left">View Details!</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">Total Alat <?php echo $total_alat ?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('aspiran/daftar') ?>">
                  <span class="float-left">View Details!</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5">Peminjaman Hari Ini</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#peminjamanbrg">
                  <span class="float-left">View Details!</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <div class="card mb-3" id="peminjamanbrg">
              <div class="card-header">
                  <i class="fas fa-table"></i>
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
                      <th>Penanggung Jwb</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach ($peminjaman as $peminjamans): ?>
                    <tr>
                      <td><?php echo $peminjamans->siswa; ?></td>
                      <td><?php echo $peminjamans->nama_alat; ?></td>
                      <td><?php echo $peminjamans->jumlah_pinjam; ?></td>
                      <td><?php echo $peminjamans->tanggal_peminjaman; ?></td>
                      <td><?php echo $peminjamans->ket; ?></td>
                      <td><?php echo $peminjamans->guru; ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- <div class="card-footer small text-muted"> Updated yesterday at 11:59 PM</div> -->
            <div class="card-footer small text-muted">Page rendered in <strong>{elapsed_time}</strong> seconds. 
                 <?php // echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?><?php //echo "Sekarang waktu menunjukkan pukul ", date("h:i A"), date(" l, d F Y");?>
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
    
  </body>

</html>
