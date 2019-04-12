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
                  <?php $i=0; foreach ($pinjamkan as $pinjamkans): ?>       
                        <tr>
                            <td><?php echo $pinjamkans->nama_alat ?></td>
                            <td><?php echo $pinjamkans->jumlah_pinjam ?></td>
                            <td><?php echo $pinjamkans->siswa ?></td>
                            <td><?php echo $pinjamkans->guru ?></td>
                            <td><?php echo $pinjamkans->tanggal_peminjaman ?></td>
                            <td><?php echo $pinjamkans->ket ?></td>
                            <td><?php echo $pinjamkans->status ?></td>
                            <td style="text-align: center;">
                              <a onclick="hapusPinjaman('<?php echo site_url('aspiran/hapus_pinjaman/'
                                .$pinjamkans->id_peminjaman) ?>')" class="btn btn-danger submit" title="Tolak" style="color:white;" href="#">
                                <i class="fa fa-trash"></i> </a>
                              <a onclick="editPinjaman<?php echo $i;?>('')" class="btn btn-warning submit" title="Tambah Keterangan"
                                 style="color:white;" href="#"><i class="fa fa-edit"></i></a>
                              <a onclick="konfirmasiPinjamkan('<?php echo site_url('aspiran/submit_pinjamkan/'
                                .$pinjamkans->id_peminjaman) ?>')"
                                  class="btn btn-primary submit" title="Pinjamkan" style="color:white;" href="#">
                                <i class="fa fa-thumbs-up"></i></a></td>
                          </tr>
                          <?php $i++; endforeach; ?>
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

    <!-- Scroll to Top Button-->
    <?php $this->load->view("aspiran/_partials/scrolltop.php") ?>
    <!-- Modal-->
    <?php $this->load->view("aspiran/_partials/modal.php") ?>
    <?php $i=0; foreach($pinjamkan as $pinjamkans): ?>
          <!-- Edit Pinjaman Modal-->
      <div class="modal fade" id="editpinjamanModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content"> 
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Keterangan Pinjam</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?php base_url('aspiran/edit_pinjaman') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_pinjam" value="<?php echo $pinjamkans->id_peminjaman;?>" />
                <div class="form-group">
                <input type=text class="form-control" name="keterangan" value="<?php echo $pinjamkans->ket;?>">
                </div>
                <input type="submit" class="btn btn-primary">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batalkan</button>
              </form>
            </div>
            <div class="modal-footer">       
            </div>
          </div>
        </div>
      </div>
      <?php $i++; endforeach;?>

    <!-- Js-->
    <?php $this->load->view("aspiran/_partials/js.php") ?>
    
    <script>
      <?php $i=0; foreach($pinjamkan as $pinjamkans): ?>
    
    function editPinjaman<?php echo $i;?>(url){
       $('#btn-edit-pinjaman').attr('href', url);
       $('#editpinjamanModal<?php echo $i;?>').modal();
     }
      <?php $i++; endforeach;?>

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