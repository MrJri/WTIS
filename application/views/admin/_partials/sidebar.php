<!-- Sidebar -->
<ul class="sidebar navbar-nav">

<li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo site_url('admin') ?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Dashboard</span></a>
 </li>

<li class="nav-item <?php echo $this->uri->segment(3) == 'pinjamkan' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo site_url('admin/alat/pinjamkan') ?>">
      <i class="fas fa-fw fa-plus"></i>
        <span>Pinjamkan Alat</span></a>
 </li>    

<li class="nav-item <?php echo $this->uri->segment(3) == 'pengembalian' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo site_url('admin/alat/pengembalian') ?>">
      <i class="fas fa-fw fa-share"></i>
        <span>Pengembalian Alat</span></a>
 </li>    

<li class="nav-item <?php echo $this->uri->segment(3) == 'daftar' ? 'active': '' ?> 
                    <?php echo $this->uri->segment(3) == 'edit' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/alat/daftar') ?>">
   <i class="fas fa-fw fa-table"></i>
     <span>Daftar Alat</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(3) == 'tambah' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/alat/tambah') ?>">
   <i class="fas fa-fw fa-user-plus"></i>
     <span>Tambah Alat</span></a>

<li class="nav-item <?php echo $this->uri->segment(3) == 'tambah_guru' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/users/tambah_guru') ?>">
   <i class="fas fa-fw fa-user-plus"></i>
     <span>Tambah Guru</span></a>
</li>  
<li class="nav-item <?php echo $this->uri->segment(3) == 'guru' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/users/guru') ?>">
   <i class="fas fa-fw fa-user"></i>
     <span>Daftar Guru</span></a>
</li>
    
<li class="nav-item <?php echo $this->uri->segment(3) == 'daftar_siswa' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('admin/users/daftar_siswa') ?>">
   <i class="fas fa-fw fa-users"></i>
     <span>Daftar Siswa</span></a>
</li>
</ul>