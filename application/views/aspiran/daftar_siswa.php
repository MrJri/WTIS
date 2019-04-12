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
                  <i class="fas fa-users"></i>
                  Data Siswa</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Email</th>
                      <th>No. HP</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php foreach($siswa as $siswas): ?>
                    <tr>
                      <td><?php echo $siswas ->nis ?></td>
                      <td><?php echo $siswas ->nama ?></td>
                      <td><?php echo $siswas ->tingkat." - ".$siswas ->kelas ?></td>
                      <td><?php echo $siswas ->email ?></td>
                      <td><?php echo $siswas ->no_hp ?></td>
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