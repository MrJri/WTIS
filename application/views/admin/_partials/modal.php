<!-- Logout Modal-->
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

    <!-- Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda YaQueen?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" >Delete</a>
      </div>
    </div>
  </div>
</div>


<!-- Pengembalian Confirmation-->
<div class="modal fade" id="pengembalianModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda YaQueen?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah alat yang dipinjam sudah dikembalikan ?</div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Tidak</button>
        <a id="btn-delete-pengembalian" class="btn btn-primary" >Ya!</a>
      </div>
    </div>
  </div>
</div>

<!-- Edit Pinjaman Modal-->
<div class="modal fade" id="editpinjamanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Keterangan Pinjam</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php foreach ($pinjamkan as $pinjamkans): ?>       
        <form action="<?php base_url('admin/alat/edit_pinjaman') ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $pinjamkans->id_peminjaman;?>" />
          <div class="form-group">
          <input type=text class="form-control" name="keterangan" value="<?php echo $pinjamkans->ket;?>">
          </div>
          <input type="submit" class="btn btn-primary">
          <button class="btn btn-danger" type="button" data-dismiss="modal">Batalkan</button>
        </form>
      </div>
      <div class="modal-footer">
      
        
        <?php endforeach; ?>
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
      <div class="modal-body">Request Peminjaman akan dihapus !</div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Tidak</button>
        <a id="btn-delete-peminjaman" class="btn btn-primary" >Ya!</a>
      </div>
    </div>
  </div>
</div>

<!-- Pinjamkan Confirmation-->
<div class="modal fade" id="konfirmasipinjamkanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda YaQueen?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah alat yang akan dipinjam sudah diberikan kepada siswa ?</div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Tidak</button>
        <a id="btn-konfirmasi-pinjamkan" class="btn btn-primary" >Ya!</a>
      </div>
    </div>
  </div>
</div>