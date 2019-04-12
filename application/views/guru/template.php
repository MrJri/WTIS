<!DOCTYPE html>
<html lang="en">

  <head>
  <?php $this->load->view("guru/_partials/head.php") ?>
  </head>

  <body id="page-top">
    
  <!-- Navbar-->
  <?php $this->load->view("guru/_partials/navbar.php") ?>

    <div id="wrapper">

      <!-- Sidebar-->
      <?php $this->load->view("guru/_partials/sidebar.php") ?>

        ///ISI BODY
        TERAKHIRNYA YG CONTENT FLUID BARU FOOTER!

            <!-- Sticky Footer -->
            <?php $this->load->view("guru/_partials/footer.php") ?>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view("guru/_partials/scrolltop.php") ?>
    <!-- Modal-->
    <?php $this->load->view("guru/_partials/modal.php") ?>
    <!-- Js-->
    <?php $this->load->view("guru/_partials/js.php") ?>

</body>

</html>