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
                    <a href="<?php echo site_url('admin/siswa') ?>"><i class=""></i>
                    , Kembali</a>
				</div>
		<?php endif; ?>

          <!-- Page Content -->
          <div class="card mb-3">
              <div class="card-header">
                  <i class="fas fa-edit"></i>
                  Edit Akun Siswa
              </div>
              <div class="card-body">
                <form action="<?php base_url('admin/edit_siswa') ?>" method="post" enctype="multipart/form-data" >
                  <?php /*<div class="form-group">
                    <label for="nama">NIP*</label>
                    <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
                     type="number" name="nama" placeholder="08xxxxxxxx" autofocus required/>
                    <div class="invalid-feedback">
                      <?php echo form_error('nama') ?>
                    </div>
                  </div> */ ?>
                    <input type="hidden" name="id" value="<?php echo $akun->id_akun?>" />
                    <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="nis">NIS*</label>
                        <input class="form-control <?php echo form_error('nis') ? 'is-invalid':'' ?>"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        type = "number" maxlength = "8"
                         name="nis" placeholder="1711xxxx" value="<?php echo $akun->nis ?>" required autofocus/>
                        <div class="invalid-feedback">
                          <?php echo form_error('nis') ?>
                        </div>
                      </div>

                    <div class="form-group col-md-3">
                        <label for="nama">Nama*</label>
                        <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
                        type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $akun->nama ?>" required/>
                        <div class="invalid-feedback">
                          <?php echo form_error('nama') ?>
                        </div>
                      </div>

                    <div class="form-group col-md-3">
                      <label for="tingkat">Tingkat*</label>
                      <select id="tingkat" name="tingkat" class="form-control" required="required">
                        <option>-</option>
                        <option value="10" <?php echo $akun->tingkat == '10' ? 'selected': '' ?>>10</option>
                        <option value="11" <?php echo $akun->tingkat == '11' ? 'selected': '' ?>>11</option>
                        <option value="12" <?php echo $akun->tingkat == '12' ? 'selected': '' ?>>12</option>
                        <option value="13" <?php echo $akun->tingkat == '13' ? 'selected': '' ?>>13</option>
                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="kelas">Kelas*</label>
                        <select id="kelas" name="kelas" class="form-control" required="required">
                          <option>-</option>
                          <option value="A" <?php echo $akun->kelas == 'A' ? 'selected': '' ?>>A</option>
                          <option value="B" <?php echo $akun->kelas == 'B' ? 'selected': '' ?>>B</option>
                          <option value="C" <?php echo $akun->kelas == 'C' ? 'selected': '' ?>>C</option>
                          <option value="D" <?php echo $akun->kelas == 'D' ? 'selected': '' ?>>D</option>
                        </select>
                      </div>
                    </div>

                  <div class="form-group">
                    <label for="email">Email*</label>
                    <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
                     type="email" name="email" placeholder="Email" value="<?php echo $akun->email ?>" required />
                    <div class="invalid-feedback">
                      <?php echo form_error('email') ?>
                    </div>
                  </div>

                  

                    <div class="form-group">
                      <label for="nohp">No. HP</label>
                      <input class="form-control <?php echo form_error('nohp') ? 'is-invalid':'' ?>"
                       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        type = "number" maxlength = "14"
                        name="nohp" placeholder="089xxx" value="<?php echo $akun->no_hp ?>"/>
                      <div class="invalid-feedback">
                        <?php echo form_error('nohp') ?>
                      </div>
                    </div>
    
                  <div class="form-group">
                      <label for="password">Password*</label>
                      <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
                       type="password" name="password" placeholder="Masukkan Password" required />
                      <div class="invalid-feedback">
                        <?php echo form_error('password') ?>
                      </div>
                    </div>

                  <input class="btn btn-success" type="submit" name="btn" value="Save!" />
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