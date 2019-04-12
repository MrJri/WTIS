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

        <?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
          <a href="<?php echo site_url('admin/daftar') ?>"><i class=""></i>
                    , Ke Daftar Alat</a>
				</div>
				<?php endif; ?>

          <!-- Page Content -->
          <div class="card mb-3">
              <div class="card-header">
                  <i class="fas fa-edit"></i>
                  Form Tambah Alat
              </div>
              <div class="card-body">
                <form action="<?php base_url('admin/tambah') ?>" method="post" enctype="multipart/form-data" >
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="nama">Nama Alat*</label>
                        <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
                        type="text" name="nama" placeholder="Mikrotik / Cisco / Juniper dll (?)" autofocus required/>
                        <div class="invalid-feedback">
                          <?php echo form_error('nama') ?>
                        </div>
                      </div>
        
                      <div class="form-group col-md-3">
                          <label for="jenis">Jenis*</label>
                          <input class="form-control <?php echo form_error('jenis') ? 'is-invalid':'' ?>"
                          type="text" name="jenis" placeholder="Router / Switch dll.." required/>
                          <div class="invalid-feedback">
                            <?php echo form_error('jenis') ?>
                          </div>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="jumlah">Jumlah*</label>
                        <input class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>"
                        type="number" name="jumlah" placeholder="Jumlah" required/>
                        <div class="invalid-feedback">
                          <?php echo form_error('jumlah') ?>
                        </div>
                      </div>
        
                      <div class="form-group col-md-3">
                          <label for="kondisi">Kondisi</label>
                          <input class="form-control <?php echo form_error('kondisi') ? 'is-invalid':'' ?>"
                          type="text" name="kondisi" placeholder="Baik / Buruk" />
                          <div class="invalid-feedback">
                            <?php echo form_error('kondisi') ?>
                          </div>
                        </div>
                    </div>
                  <button class="btn btn-success" type="submit">Tambah Ya !</button>
                </form>
    
              </div>
    
              <div class="card-footer small text-muted">* Wajib diisi | Page rendered in <strong>{elapsed_time}</strong> seconds. 
                   <?php //echo "Sekarang waktu menunjukkan pukul ", date("h:i A"), date(" l, d F Y");?>
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