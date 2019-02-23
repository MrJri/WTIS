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
                  <i class="fas fa-edit"></i>
                  Form Tambah Siswa
              </div>
              <div class="card-body">
                <form action="<?php base_url('admin/tambah_siswa') ?>" method="post" enctype="multipart/form-data" >
                  <?php /*<div class="form-group">
                    <label for="nama">NIP*</label>
                    <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
                     type="number" name="nama" placeholder="08xxxxxxxx" autofocus required/>
                    <div class="invalid-feedback">
                      <?php echo form_error('nama') ?>
                    </div>
                  </div> */ ?>
                  <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="nis">NIS</label>
                        <input class="form-control <?php echo form_error('nis') ? 'is-invalid':'' ?>"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        type = "number" maxlength = "9" name="nis" placeholder="1711xxxx" required autofocus/>
                        <div class="invalid-feedback">
                          <?php echo form_error('nis') ?>
                        </div>
                      </div>

                    <div class="form-group col-md-3">
                        <label for="nama">Nama</label>
                        <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
                        type="text" name="nama" placeholder="Nama Lengkap" required/>
                        <div class="invalid-feedback">
                          <?php echo form_error('nama') ?>
                        </div>
                      </div>

                    <div class="form-group col-md-3">
                      <label for="tingkat">Tingkat</label>
                      <select id="tingkat" name="tingkat" class="form-control" required>
                        <option>-</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="kelas">Kelas</label>
                        <select id="kelas" name="kelas" class="form-control" required>
                          <option>-</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                    </div>
                  
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
                      type="email" name="email" placeholder="siswa@contoh.com" required />
                      <div class="invalid-feedback">
                        <?php echo form_error('email') ?>
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="password">Password</label>
                      <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
                       type="password" name="password" placeholder="Masukkan Password" required />
                      <div class="invalid-feedback">
                        <?php echo form_error('password') ?>
                      </div>
                    </div>
                    </div>  

                    <div class="form-group">
                      <label for="nohp">No. HP</label>
                      <input class="form-control <?php echo form_error('nohp') ? 'is-invalid':'' ?>"
                       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        type = "number" maxlength = "14"
                        name="nohp" placeholder="089xxx"/>
                      <div class="invalid-feedback">
                        <?php echo form_error('nohp') ?>
                      </div>
                    </div>

                  <input class="btn btn-success" type="submit" name="btn" value="Save!" />
                </form>
    
              </div>
    
              <div class="card-footer small text-muted">Semua Data Wajib diisi | Page rendered in <strong>{elapsed_time}</strong> seconds. 
            <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . 
            '</strong>' : '' ?><?php //echo "Sekarang waktu menunjukkan pukul ", date("h:i A"), date(" l, d F Y");?>
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