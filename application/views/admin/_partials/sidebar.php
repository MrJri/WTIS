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

<li class="nav-item <?php echo $this->uri->segment(2) == 'daftar' ? 'active': '' ?> 
                    <?php echo $this->uri->segment(2) == 'edit' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/daftar') ?>">
   <i class="fas fa-fw fa-table"></i>
     <span>Daftar Alat</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'guru' ? 'active': '' ?>
                    <?php echo $this->uri->segment(2) == 'edit_guru' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/guru') ?>">
   <i class="fas fa-fw fa-user"></i>
     <span>Daftar Guru</span></a>
</li>
    
<li class="nav-item <?php echo $this->uri->segment(2) == 'siswa' ? 'active': '' ?>
                    <?php echo $this->uri->segment(2) == 'edit_siswa' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/siswa') ?>" >
   <i class="fas fa-fw fa-users"></i>
     <span>Daftar Siswa</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'tambah' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/tambah') ?>">
   <i class="fas fa-fw fa-user-plus"></i>
     <span>Tambah Alat</span></a>

<li class="nav-item <?php echo $this->uri->segment(2) == 'tambah_guru' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/tambah_guru') ?>">
   <i class="fas fa-fw fa-user-plus"></i>
     <span>Tambah Guru</span></a>
</li>  
<li class="nav-item <?php echo $this->uri->segment(2) == 'tambah_siswa' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/tambah_siswa') ?>">
   <i class="fas fa-fw fa-user-plus"></i>
     <span>Tambah Siswa</span></a>
</li>  
</ul>