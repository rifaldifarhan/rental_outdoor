<?php
error_reporting(0);
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";
include "navbar.php";
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[password])){
  echo "<SCRIPT language=Javascript>
  alert('Untuk mengakses halaman ini anda harus login terlebih dahulu')
  </script>";
  echo "<meta http-equiv='refresh' content='0; url=../index.php'/>";
}
else{
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APLIKASI PENYEWAAN ALAT OUTDOOR</title>
       
  <link href="../css/admin.css" rel="stylesheet">
  <link href="../css/creative.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

            <!-- Collect the nav links, forms, and other content for toggling -->
           

               
                <!-- <li class="dropdown">
                <a class="fa fa-database" href="#" class="dropdown-toggle" data-toggle="dropdown"> Data Master <span class="caret"></span></a> -->
                <!-- <ul class="dropdown-menu" role="menu"> -->
                <!-- <li><a class="fa fa-circle" href="?pg=adm&act=view"> Data Admin</a></li>
                <li><a class="fa fa-circle" href="?pg=pytr&act=view"> Data Penyewa</a></li> -->
             <!--   <li><a class="fa fa-circle" href="?pg=ktgr&act=view"> Data Kategori</a></li> -->



                <!-- <li class="dropdown">
                <a class="fa fa-shopping-cart" href="#" class="dropdown-toggle" data-toggle="dropdown"> Transaksi <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                <li><a class="fa fa-circle" href="?pg=trs&act=view"> Penyewaan</a></li>
                <li><a class="fa fa-circle" href="?pg=pgb&act=view"> Pengembalian</a></li>
                </ul>
                </li> -->
              
                <!--  -->

                        </p>
                      </li>

                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-right">

                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>

          <!-- Main content -->
          <?php include "content.php"; ?>
          <!-- /.content -->


     

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../dist/js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- daterangepicker -->
    <script src="../dist/js/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
     <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../plugins/chartjs/Chart.min.js"></script>
    <!-- Donut Chart -->
    <script src="../plugins/chartjs/Chart.Doughnut.js"></script>

    <!-- Fileinput.js -->
    <script src="../bootstrap/js/photo_adm.js"></script>

    <!-- Select2 -->
    <script src="../plugins/select2/select2.full.min.js"></script>

    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true
        });
      });
    </script>

    <!-- page script Select2 Elements -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
         });
    </script>

    <!-- page script Submenu -->
    <script src="../dist/js/bootstrap-submenu.min.js"></script>

    <!-- page script Dropdown Submenu -->
    <script type="text/javascript">
    $(document).ready(function() {

    $( ".dropdown-submenu" ).click(function(event) {
        // stop bootstrap.js to hide the parents
        event.stopPropagation();
        // hide the open children
        $( this ).find(".dropdown-submenu").removeClass('open');
        // add 'open' class to all parents with class 'dropdown-submenu'
        $( this ).parents(".dropdown-submenu").addClass('open');
        // this is also open (or was)
        $( this ).toggleClass('open');
      });
  });
    </script>

    <!-- page script datepicker -->
    <script>
    $(document).ready(function(){
      var date_input=$('input[id="date"]'); //our date input has the name "date"
      var container=$('.content form').length>0 ? $('.content form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>

 </script>
<!-- upload gambar dengan preview -->
    <script type="text/javascript">
    function PreviewImage(no) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage"+no).files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview"+no).src = oFREvent.target.result;
        };
    }
</script>
  </body>
</html>

<?php
}
?>

