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
                                                <div class="subalat">
                                                    <form>
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            Mau Brp?
                                                        </div>
                                                        <div class="col-md-5">  
                                                        <?php   echo form_hidden('id_alat', $row->id_alat);?>
                                                        <?php   echo form_input('quantity', '1', 'maxlength="2" class="form-control form-control-sm"'); ?>
                                                        </div>
                                                    </div>                                                
                                                    <br>
                                                    <input type="submit" class="btn btn-success btn-block col-md" value="Pinjam">
                                                    <?php       echo form_close(); ?>
                                                </div>
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
                            <!--<div class="card-body">-->
                                <div id="cart_content">
                                    <?php //$this->load->view('siswa/cart'); ?>
                                </div>
                            <!--</div>-->
                            <div class="card-footer small text-muted">
                                Jika jumlah alat nya 0(nol), alat akan dihapus. Page rendered in <strong>{elapsed_time}</strong> seconds.
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

<script>
    $(document).ready(function() { 
        var link = "/weteies/index.php/"; // Url to your application (including index.php/)
        $('#cart_content').load("<?php echo site_url('siswa/show_cart');?>");
        
        /*place jQuery actions here*/ 
        $("div.subalat form").submit(function() {
            // Get the product ID and the quantity 
            var id = $(this).find('input[name=id_alat]').val();
            var qty = $(this).find('input[name=quantity]').val();
            $.ajax({
                url : "<?php echo site_url('siswa/addcart');?>",
                method : "POST",
                data : {id_alat: id, quantity: qty},
                success: function(data){
                    show_cart();
                    $('#cart_content').load("<?php echo site_url('siswa/show_cart');?>");
                }
            });
            
            /*$.post(link + "siswa/addcart", { id_alat: id, quantity: qty, ajax: '1' },
                function(data){
                    // Interact with returned data
                    if(data == 'true'){    
                        show_cart();
                        //$.get(link + "siswa/show_cart", function(cart){ // Get the contents of the url siswa/show_cart
                        //        $("#cart_content").html(cart); // Replace the information in the div #cart_content with the retrieved data  
                        //}); 		   
                    }else{
                        alert("Product does not exist");
                    }
            });*/
        });
    });
</script>

<!--<script type="text/javascript">
    $(document).ready(function(){

        $('.pinjam').click(function(){
            var id    = $(this).data("productid");
            var nama  = $(this).data("productname");
            var product_price = $(this).data("productprice");
            var quantity      = $('#' + id).val();
            $.ajax({
                url : "<?php //echo site_url('siswa/add_to_cart');?>",
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
                url : "<?php //echo site_url('siswa/add_to_cart');?>",
                method : "POST",
                data : {id: id, nama: nama, product_price: product_price, quantity: quantity},
                success: function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
 
         
        $('#detail_cart').load("<?php //echo site_url('siswa/load_cart');?>");
 
         
        $(document).on('click','.romove_cart',function(){
            var row_id=$(this).attr("id"); 
            $.ajax({
                url : "<?php // echo site_url('siswa/delete_cart');?>",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
    });
</script>-->

</html>