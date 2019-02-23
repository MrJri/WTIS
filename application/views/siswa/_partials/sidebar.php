<!-- Sidebar -->
<ul class="sidebar navbar-nav">

<li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo site_url('siswa') ?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Dashboard</span></a>
 </li>
    
<li class="nav-item <?php echo $this->uri->segment(3) == 'siswa' ? 'active': '' ?>
 <a class="nav-link" href="<?php echo site_url('siswa/daftar_siswa') ?>" >
   <i class="fas fa-fw fa-users"></i>
     <span>Daftar Siswa</span></a>
</li>
</ul>