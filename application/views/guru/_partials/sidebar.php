<!-- Sidebar -->
<ul class="sidebar navbar-nav">
          <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('guru') ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Permintaan Persetujuan</span></a>
          </li>
          <li class="nav-item <?php echo $this->uri->segment(2) == 'tanggung_jawab' ? 'active': '' ?>">
              <a class="nav-link" href="<?php echo site_url('guru/tanggung_jawab') ?>">
                <i class="fas fa-fw fa-edit"></i>
                <span>Pertanggung Jawaban</span></a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="guru_daftaralat.html">
              <i class="fas fa-fw fa-table"></i>
              <span>Daftar Alat</span></a>
          </li>
        </ul>