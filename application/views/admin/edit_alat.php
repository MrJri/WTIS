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
				</div>
				<?php endif; ?>

          <!-- Page Content -->
          <div class="card mb-3">
              <div class="card-header">
                <a href="<?php echo site_url('admin/daftar') ?>"><i class="fas fa-arrow-left"></i>
                    Back</a>
              </div>

              <div class="card-body">
                <form action="<?php base_url('admin/edit') ?>" method="post" enctype="multipart/form-data" >
                  <input type="hidden" name="id" value="<?php echo $alat->id_alat?>" />
                  <div class="form-group">
                    <label for="nama">Nama Alat*</label>
                    <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
                     type="text" name="nama" placeholder="Mikrotik / Cisco / Juniper dll (?)" value="<?php echo $alat->nama_alat ?>" />
                    <div class="invalid-feedback">
                      <?php echo form_error('nama') ?>
                    </div>
                  </div>
    
                  <div class="form-group">
                      <label for="jenis">Jenis*</label>
                      <input class="form-control <?php echo form_error('jenis') ? 'is-invalid':'' ?>"
                       type="text" name="jenis" placeholder="Router / Switch dll.." value="<?php echo $alat->jenis ?>"/>
                      <div class="invalid-feedback">
                        <?php echo form_error('jenis') ?>
                      </div>
                    </div>

                  <div class="form-group">
                    <label for="jumlah">Jumlah*</label>
                    <input class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>"
                     type="number" name="jumlah" placeholder="Jumlah" value="<?php echo $alat->jumlah ?>"/>
                    <div class="invalid-feedback">
                      <?php echo form_error('jumlah') ?>
                    </div>
                  </div>
    
                  <div class="form-group">
                      <label for="kondisi">Kondisi</label>
                      <input class="form-control <?php echo form_error('kondisi') ? 'is-invalid':'' ?>"
                       type="text" name="kondisi" placeholder="Baik / Buruk" value="<?php echo $alat->kondisi ?>"/>
                      <div class="invalid-feedback">
                        <?php echo form_error('kondisi') ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="status">Status</label>
                      <input class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>"
                       type="text" name="status" placeholder="Tersisa xx.." value="<?php echo $alat->status_alat ?>"/>
                      <div class="invalid-feedback">
                        <?php echo form_error('status') ?>
                      </div>
                    </div>
                  <input class="btn btn-success" type="submit" name="btn" value="Save !" />
                </form>
    
              </div>
    
              <div class="card-footer small text-muted">
                * wajib diisi
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