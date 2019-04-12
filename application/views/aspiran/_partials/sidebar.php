<!-- Sidebar -->
<ul class="sidebar navbar-nav">

<li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo site_url('aspiran') ?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Dashboard</span></a>
 </li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'pinjamkan' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo site_url('aspiran/pinjamkan') ?>">
      <i class="fas fa-fw fa-plus"></i>
        <span>Pinjamkan Alat</span></a>
 </li>    

<li class="nav-item <?php echo $this->uri->segment(2) == 'pengembalian' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo site_url('aspiran/pengembalian') ?>">
      <i class="fas fa-fw fa-share"></i>
        <span>Pengembalian Alat</span></a>
 </li>    

<!--<li class="nav-item <?php /*echo $this->uri->segment(2) == 'daftar' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('aspiran/daftar') ?>">
   <i class="fas fa-fw fa-table"></i>
     <span>Daftar Alat</span></a>
</li>

<li class="nav-item <?php echo $this->uri->segment(2) == 'guru' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('aspiran/guru') ?>">
   <i class="fas fa-fw fa-user"></i>
     <span>Daftar Guru</span></a>
</li>
    
<li class="nav-item <?php echo $this->uri->segment(2) == 'siswa' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('aspiran/siswa') */?>" >
   <i class="fas fa-fw fa-users"></i>
     <span>Daftar Siswa</span></a>
</li>-->
<li class="nav-item <?php echo $this->uri->segment(2) == 'history' ? 'active': '' ?>">
 <a class="nav-link" href="<?php echo site_url('aspiran/history') ?>" >
   <i class="fas fa-fw fa-table"></i>
     <span>Histori Peminjaman</span></a>
</li>

</ul>