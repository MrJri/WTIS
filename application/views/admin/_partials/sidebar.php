<!-- Sidebar -->
<ul class="sidebar navbar-nav">

<li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo site_url('admin') ?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Dashboard</span></a>
 </li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'pinjamkan' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo site_url('admin/pinjamkan') ?>">
      <i class="fas fa-fw fa-plus"></i>
        <span>Pinjamkan Alat</span></a>
 </li>    

<li class="nav-item <?php echo $this->uri->segment(2) == 'pengembalian' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo site_url('admin/pengembalian') ?>">
      <i class="fas fa-fw fa-share"></i>
        <span>Pengembalian Alat</span></a>
 </li>    

<li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'daftar' ? 'active': '' ?> 
                              <?php echo $this->uri->segment(2) == 'edit' ? 'active': '' ?>
                              <?php echo $this->uri->segment(2) == 'tambah' ? 'active': '' ?>">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-table"></i>
    <span>Alat</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="<?php echo site_url('admin/daftar') ?>">Daftar Alat</a>
    <a class="dropdown-item" href="<?php echo site_url('admin/tambah') ?>">Tambah Alat</a>
  </div>
</li>

<li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'aspiran' ? 'active': '' ?> 
                              <?php echo $this->uri->segment(2) == 'edit_aspiran' ? 'active': '' ?>
                              <?php echo $this->uri->segment(2) == 'tambah_aspiran' ? 'active': '' ?>">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-table"></i>
    <span>Aspiran</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="<?php echo site_url('admin/aspiran') ?>">Daftar Aspiran</a>
    <a class="dropdown-item" href="<?php echo site_url('admin/tambah_aspiran') ?>">Tambah Aspiran</a>
  </div>
</li>

<li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'guru' ? 'active': '' ?> 
                              <?php echo $this->uri->segment(2) == 'edit_guru' ? 'active': '' ?>
                              <?php echo $this->uri->segment(2) == 'tambah_guru' ? 'active': '' ?>">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-table"></i>
    <span>Guru</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="<?php echo site_url('admin/guru') ?>">Daftar Guru</a>
    <a class="dropdown-item" href="<?php echo site_url('admin/tambah_guru') ?>">Tambah Guru</a>
  </div>
</li>

<li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'siswa' ? 'active': '' ?> 
                              <?php echo $this->uri->segment(2) == 'edit_siswa' ? 'active': '' ?>
                              <?php echo $this->uri->segment(2) == 'tambah_siswa' ? 'active': '' ?>">
  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-table"></i>
    <span>Siswa</span>
  </a>
  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    <a class="dropdown-item" href="<?php echo site_url('admin/siswa') ?>">Daftar Siswa</a>
    <a class="dropdown-item" href="<?php echo site_url('admin/tambah_siswa') ?>">Tambah Siswa</a>
  </div>
</li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'history' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/history') ?>">
   <i class="fas fa-fw fa-table"></i>
     <span>Histori Peminjaman</span></a>
</li>  

</ul>