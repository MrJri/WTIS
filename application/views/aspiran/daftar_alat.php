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
                    </tr>
                  </thead>

                  <tbody>
                  <?php foreach ($alat as $alats): ?>
                    <tr>
                      <td><?php echo $alats->nama_alat ?></td>
                      <td><?php echo $alats->jenis ?></td>
                      <td><?php echo $alats->jumlah ?></td>
                      <td><?php echo $alats->kondisi ?></td>
                      <td>Tersisa <?php echo $alats->status_alat ?></td>
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
    function deleteConfirm(url){
       $('#btn-delete').attr('href', url);
       $('#deleteModal').modal();
     }
    </script>

  </body>

</html>