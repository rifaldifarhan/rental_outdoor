<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW Data penyewa //      
      case 'view':
      ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
       <center> <h1> Data penyewa </h1></center>
            
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
   
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama penyewa</th>
                        <th>jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Alamat</th>
                        <th>No telepon</th>
                        <th>Pekerjaan</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysqli_query($koneksi,"SELECT * FROM tblpenyewa order by idpenyewa asc");
                    $no = 1;
                      while ($r=mysqli_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
                        <td><?php echo "$r[nmpenyewa]"?></td>
                        
                        <?php
                        if ($r['jenkel']=="L"){
                          $jenkel = "Laki-laki";
                        } else {
                          $jenkel = "Perempuan";
                        }
                        ?>

                        <td><?php echo "$jenkel"?></td>
                        <td><?php echo "$r[usia]"?></td>
                        <td><?php echo "$r[alamat]"?></td>
                        <td><?php echo "$r[cperson]"?></td>
                        <td><?php echo "$r[pekerjaan]"?></td>
                       
                        
                        <td><a href="?pg=pytr&act=delete&id=<?php echo $r['idpenyewa']?>"><button type="button" class="btn btn-success" onclick="return confirm('Apakah anda yakin akan menghapusnya?');">Hapus</button></a></td>
<!-- 
                        <td><a href="?pg=pytr&act=delete&id=<?php echo $row['idpenyewa']; ?>" class="btn btn-success">Hapus</a></td> -->
                        </tr>

                    <?php
                    $no++;
                    }
                    ?>
                    </tbody>
                  </table>
                  </div><!-- /.box-body -->
              </div>
              </div><!-- /.box -->
              </div> <!-- /.col -->
	</div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->

    <?php
    break;

    // PROSES HAPUS Data penyewa //
      case 'delete':
      mysqli_query($koneksi,"DELETE FROM tblpenyewa WHERE idpenyewa='$_GET[id]'");
      echo "<script>window.location='home.php?pg=pytr&act=view'</script>";
      break;

    }
    ?>