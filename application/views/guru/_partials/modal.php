<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo site_url('login/logout') ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

<!-- Izinkan Peminjaman-->
<div class="modal fade" id="izinkanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda YaQueen?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Peminjaman akan diizinkan !</div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Batalkan</button>
        <a id="btn-izinkan" class="btn btn-primary" >Ya!</a>
      </div>
    </div>
  </div>
</div>

<!-- Hapus Peminjaman-->
<div class="modal fade" id="hapuspeminjamanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda YaQueen?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Request Peminjaman akan ditolak !</div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Batalkan</button>
        <a id="btn-delete-peminjaman" class="btn btn-primary" >Ya!</a>
      </div>
    </div>
  </div>
</div>