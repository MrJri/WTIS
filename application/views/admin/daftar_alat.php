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
                Daftar Alat yang Tersedia
            </div>
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
                      <td><?php echo $alats->nama_alat ?></td>
                      <td><?php echo $alats->jenis ?></td>
                      <td><?php echo $alats->jumlah ?></td>
                      <td><?php echo $alats->kondisi ?></td>
                      <td><?php echo $alats->status_alat ?></td>
                      <td style="text-align: center;">
                        <a href="<?php echo site_url('admin/edit/'.$alats->id_alat) ?>" class="btn btn-primary submit" 
                            title="Edit Barang" style="color:white;"><i class="fa fa-edit"></i></a>
                        <a onclick="deleteConfirm('<?php echo site_url('admin/delete/'.$alats->id_alat) ?>')" 
                            class="btn btn-danger submit" title="Hapus Barang" style="color:white;" href="#!">
                              <i class="fa fa-trash"></i></a>
                        </td>
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

    <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <!-- Modal-->
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <!-- Js-->
    <?php $this->load->view("admin/_partials/js.php") ?>
    
    <script>
    function deleteConfirm(url){
       $('#btn-delete').attr('href', url);
       $('#deleteModal').modal();
     }
    </script>

  </body>

</html>