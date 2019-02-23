<!DOCTYPE html>
<html lang="en">

  <head>
  <?php $this->load->view("admin/_partials/head.php") ?>
  </head>

  <body id="page-top">
    
  <!-- Navbar-->
  <?php $this->load->view("siswa/_partials/navbar.php") ?>

    <div id="wrapper">

        <!-- Sidebar-->
        <?php $this->load->view("siswa/_partials/sidebar.php") ?>

        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <h4 class="card-header">Alat Tersedia</h4>
                            <br>
                            <div class="row card-body">
                                <?php foreach ($data as $row) : ?>
                                    <div class="col-md-6">
                                        <div class="card mb-3">
                                            <!-- <img width="200" src="<?php //echo base_url().'assets/images/'.$row->product_image;?>"> -->
                                            <div class="card-header text-center"><?php echo $row->nama_alat;?>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        Tersedia
                                                    </div>
                                                    <div class="col-md-5">  
                                                        <input value="<?php echo $row->jumlah;?>" class="form-control form-control-sm" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!--<div class="col-md-7">
                                                    <h4><?php //echo number_format($row->product_price);?></h4>
                                                    </div>-->
                                                    <div class="col-md-7">
                                                        Mau Brp?
                                                    </div>
                                                    <div class="col-md-5">  
                                                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type = "number" maxlength = "14"
                                                        id="<?php echo $row->id_alat;?>" value="1" class="quantity form-control form-control-sm">
                                                    </div>
                                                </div>                                                
                                                <br><button class="add_cart btn btn-success btn-block col-md" data-productid="<?php echo $row->id_alat;?>" data-productname="<?php echo $row->nama_alat;?>" data-productprice="0">Pinjam</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <h4 class="card-header">List Pinjam</h4>    
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Alat</th>
                                                
                                                <th>Jumlah</th>
                                                <!--<th>Total</th>-->
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="detail_cart">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer small text-muted">
                                Page rendered in <strong>{elapsed_time}</strong> seconds. 
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.content-fluid -->

        <!-- Sticky Footer -->
        <?php $this->load->view("siswa/_partials/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view("siswa/_partials/scrolltop.php") ?>
    <!-- Modal-->
    <?php $this->load->view("siswa/_partials/modal.php") ?>
    <!-- Js-->
    <?php $this->load->view("siswa/_partials/js.php") ?>

</body>

<script type="text/javascript">
    $(document).ready(function(){

        $('.pinjam').click(function(){
            var id    = $(this).data("productid");
            var nama  = $(this).data("productname");
            var product_price = $(this).data("productprice");
            var quantity      = $('#' + id).val();
            $.ajax({
                url : "<?php echo site_url('siswa/add_to_cart');?>",
                method : "POST",
                data : {id: id, nama: nama, product_price: product_price, quantity: quantity},
                success: function(data){
                    $('#detail_cart').html(data);
                }
            });
        });

        $('.add_cart').click(function(){
            var id    = $(this).data("productid");
            var nama  = $(this).data("productname");
            var product_price = $(this).data("productprice");
            var quantity      = $('#' + id).val();
            $.ajax({
                url : "<?php echo site_url('siswa/add_to_cart');?>",
                method : "POST",
                data : {id: id, nama: nama, product_price: product_price, quantity: quantity},
                success: function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
 
         
        $('#detail_cart').load("<?php echo site_url('siswa/load_cart');?>");
 
         
        $(document).on('click','.romove_cart',function(){
            var row_id=$(this).attr("id"); 
            $.ajax({
                url : "<?php echo site_url('siswa/delete_cart');?>",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
    });
</script>

</html>