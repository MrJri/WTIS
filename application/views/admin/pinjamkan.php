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
                  <?php foreach ($pinjamkan as $pinjamkans): ?>       
                        <tr>
                            <td><?php echo $pinjamkans->nama_alat ?></td>
                            <td><?php echo $pinjamkans->jumlah_pinjam ?></td>
                            <td><?php echo $pinjamkans->siswa ?></td>
                            <td><?php echo $pinjamkans->guru ?></td>
                            <td><?php echo $pinjamkans->tanggal_peminjaman ?></td>
                            <td><?php echo $pinjamkans->ket ?></td>
                            <td><?php echo $pinjamkans->status ?></td>
                            <td style="text-align: center;">
                              <a onclick="hapusPinjaman('<?php echo site_url('admin/submit_pengembalian/'
                                .$pinjamkans->id_peminjaman) ?>')" class="btn btn-danger submit" title="Tolak" style="color:white;" href="#">
                                <i class="fa fa-trash"></i> </a>
                              <a onclick="editPinjaman('')" class="btn btn-warning submit" title="Tambah Keterangan"
                                 style="color:white;" href="#"><i class="fa fa-edit"></i></a>
                              <a onclick="konfirmasiPinjamkan('<?php echo site_url('admin/submit_pinjamkan/'
                                .$pinjamkans->id_peminjaman) ?>')"
                                  class="btn btn-primary submit" title="Pinjamkan" style="color:white;" href="#">
                                <i class="fa fa-thumbs-up"></i></a></td>
                          </tr>
                          <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Page rendered in <strong>{elapsed_time}</strong> seconds. 
            <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . 
            '</strong>' : '' ?><?php //echo "Sekarang waktu menunjukkan pukul ", date("h:i A"), date(" l, d F Y");?>
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

    <!-- Scroll to Top Button-->
    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <!-- Modal-->
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <!-- Js-->
    <?php $this->load->view("admin/_partials/js.php") ?>
    
    <script>
    function editPinjaman(url){
       $('#btn-edit-pinjaman').attr('href', url);
       $('#editpinjamanModal').modal();
     }
     function konfirmasiPinjamkan(url){
       $('#btn-konfirmasi-pinjamkan').attr('href', url);
       $('#konfirmasipinjamkanModal').modal();
     }
     function hapusPinjaman(url){
       $('#btn-delete-peminjaman').attr('href', url);
       $('#hapuspeminjamanModal').modal();
     }
    </script>

  </body>

</html>
