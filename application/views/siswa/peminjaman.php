<!DOCTYPE html>
<html lang="en">

  <head>
  <?php $this->load->view("siswa/_partials/head.php") ?>
  </head>

  <body id="page-top">
    
  <!-- Navbar-->
  <?php $this->load->view("siswa/_partials/navbar.php") ?>

    <div id="wrapper">

      <!-- Sidebar-->
      <?php $this->load->view("siswa/_partials/sidebar.php") ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3" id="peminjamanbrg">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Daftar Tanggung Jawab</div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Waktu Pinjam</th>
                                <th>Waktu Kembali</th>
                                <th>Ket.</th>
                                <th>Penanggung Jwb</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($peminjaman as $peminjamans): ?>
                            <tr>
                                <td><?php echo $peminjamans->nama_alat; ?></td>
                                <td><?php echo $peminjamans->jumlah_pinjam; ?></td>
                                <td><?php echo $peminjamans->tanggal_peminjaman; ?></td>
                                <td><?php echo $peminjamans->tanggal_pengembalian; ?></td>
                                <td><?php echo $peminjamans->ket; ?></td>
                                <td><?php echo $peminjamans->guru; ?></td>
                                <td><?php echo $peminjamans->status; ?></td>
                                <td>
                                    <?php if($peminjamans->status != "Dipinjam" && $peminjamans->status != "history"){ ?>
                                        <a onclick="hapusPinjamans('<?php echo site_url('siswa/hapuspinjam/'.$peminjamans->id_peminjaman)?>')" 
                                            class="btn btn-danger submit" title="Gajadi ah" style="color:white;" href="#">
                                            <i class="fa fa-trash"></i>Hapus</a><?php } ?>
                                </td>
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
            <?php $this->load->view("siswa/_partials/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view("siswa/_partials/scrolltop.php") ?>
    <!-- Modal-->
    <?php $this->load->view("siswa/_partials/modal.php") ?>
    <!-- Js-->
    <?php $this->load->view("siswa/_partials/js.php") ?>

  </body>
  <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTablee').DataTable( {
                order: [[ 8, 'desc' ]]
            } );
        } );
  </script>
  <script>
        function hapusPinjamans(url){
            $('#btn-delete-peminjaman').attr('href', url);
            $('#hapuspeminjamanModal').modal();
            }
  </script>
</html>