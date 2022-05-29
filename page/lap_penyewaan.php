<?php
switch ($_GET['act']) {
    // PROSES VIEW DATA USER //      
      case 'view':
      ?>
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> APLIKASI PENYEWAAN ALAT BERAT | BINA MARGA KABUPATEN CIREBON</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Laporan Penyewaan</a></li>
             </ol>
        </section>

<section class="content">
<div class="row">
  <div class="col-md-5">
  <form action="?pg=lpp&act=cek" method="POST">
      <div class="form-group">
      <label for="exampleInputEmail1">Tanggal</label>
      <input class="form-control" id="date" name="tglpenjualanaw" placeholder="MM/DD/YYY" type="text" required/>
      </div>
  </div>
  <div class="col-md-5">
      <div class="form-group">
      <label for="exampleInputEmail1">Tanggal</label>
      <input class="form-control" id="date" name="tglpenjualanak" placeholder="MM/DD/YYY" type="text" required/>
      </div>
  </div>
  <div class="col-md-2">
      <div class="form-group">
      <label for="exampleInputEmail1">Search</label><br>
      <input type="submit" value="Pencarian" class="btn bg-blue">
      </div>
  </div>
  </form>
	<div class="row">
		<div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">

				  <div class="callout callout-info">
                    <h4>Laporan Penyewaan !</h4>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Penyewa</th>
                        <th>Merk Alat</th>
                        <th>Jenis Alat</th>
                        <th>Harga/Hari</th>
                        <th>Lama Sewa</th>
                        <th>Batas Sewa</th>
                        <th>Jumlah</th>
                        <th>Total Biaya Sewa</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    
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

    case 'cek':
    // menampilkan pertanyaan pertama
  $sqlp = "SELECT * FROM tbltransaksi s join tblalat t
                    on (s.idalat=t.idalat) join tblpenyewa p
                    on (s.idpenyewa=p.idpenyewa) 
                    WHERE tgltransaksi BETWEEN  '$_POST[tglpenjualanaw]' AND  
                    '$_POST[tglpenjualanak]'  
                    order by idtransaksi asc";

  $rs=mysql_query($sqlp);
  $data=mysql_fetch_array($rs);

  if (!(empty($data))){
  ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> APLIKASI PENYEWAAN ALAT BERAT | BINA MARGA KABUPATEN CIREBON</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Laporan Penyewaan</a></li>
             </ol>
        </section>

<section class="content">
<div class="row">
  <div class="col-md-5">
  <form action="?pg=lpp&act=cek" method="POST">
      <div class="form-group">
      <label for="exampleInputEmail1">Tanggal</label>
      <input class="form-control" id="date" name="tglpenjualanaw" placeholder="MM/DD/YYY" type="text" required/>
      </div>
  </div>
  <div class="col-md-5">
      <div class="form-group">
      <label for="exampleInputEmail1">Tanggal</label>
      <input class="form-control" id="date" name="tglpenjualanak" placeholder="MM/DD/YYY" type="text" required/>
      </div>
  </div>
  <div class="col-md-2">
      <div class="form-group">
      <label for="exampleInputEmail1">Mulai Pencarian</label><br>
      <input type="submit" value="Pencarian" class="btn bg-blue">
      </div>
  </div>
  </form>
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">

          <div class="callout callout-info">
                    <h4>Laporan Penyewaan !</h4>
                  </div>
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Penyewa</th>
                        <th>Merk Alat</th>
                        <th>Jenis Alat</th>
                        <th>Harga/Hari</th>
                        <th>Lama Sewa</th>
                        <th>Batas Sewa</th>
                        <th>Jumlah</th>
                        <th>Total Biaya Sewa</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysql_query("SELECT * FROM tbltransaksi s join tblalat t
                    on (s.idalat=t.idalat) join tblpenyewa p
                    on (s.idpenyewa=p.idpenyewa) 
                    WHERE tgltransaksi BETWEEN  '$_POST[tglpenjualanaw]' AND  
                    '$_POST[tglpenjualanak]'  
                    order by idtransaksi asc");
                    $no = 1;
                      while ($r=mysql_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
                        
                        <?php 
                        $tgltransaksi=tgl_indo($r['tgltransaksi']);
                        $tglbatassewa=tgl_indo($r['tglbatassewa']);
                        ?>
                        <td><?php echo "$tgltransaksi"?></td>
                        <td><?php echo "$r[nmpenyewa]"?></td>
                        <td><?php echo "$r[merk]"?></td>
                        <td><?php echo "$r[jenisalat]"?></td>
                        <td><?php echo "Rp.". number_format("$r[hargasewa]",'0','.','.')?></td>
                        <td><?php echo "$r[lamasewa] "?></td>
                        <td><?php echo "$tglbatassewa "?></td>
                        <td><?php echo "$r[jmlsewa]"?></td>
                        <td><?php echo "Rp.". number_format("$r[totalbiayasewa]",'0','.','.')?></td>
                        <td><?php echo "$r[status]"?></td>
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

          <div class="row">
              <div class="col-md-2 col-md-offset-5">
              <form role="form" action="cetaksewa.php" method="POST" target="_blank">
              <div class="box-body">
                  <div class="form-group">
                  <button type="submit" class="btn btn-info">
                  <i class="fa fa-file-pdf-o">   Cetak Laporan Penyewaan Alat Berat </i>  
                  </button>
                  </div>
                  <div class="form-group">
                  <input type="hidden" class="form-control" id="tglpenjualanaw" name="tglpenjualanaw" placeholder="Nama Konsumen" value= "<?php echo $_POST['tglpenjualanaw']?>">
                  <input type="hidden" class="form-control" id="tglpenjualanak" name="tglpenjualanak" placeholder="Nama Konsumen" value= "<?php echo $_POST['tglpenjualanak']?>">
                  </div>
              </form>
          </div>
          </div>

          
          </div>

          </div>
    
    <!-- /.row (main row) -->
</section> <!-- /.content -->

    </div><!-- /.container -->
</div><!-- /.content-wrapper -->

    <?php
    } else { 
      ?>
      <div class="content-wrapper">
      <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1> Silahkan pilih</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="?pg=lpp&act=view"><i class="fa fa-dashboard"></i> Laporan Penyewaan</a></li>
             </ol>
      </section>

      <section class="content">
          <div class="box box-info">
              <div class="box-body">
                  <div class="form-group">
                  <?php
                  echo " <p> Maaf untuk pencarian yang anda cari tidak tersedia. <br>
                  Silahkan coba lakukan pencarian ulang. Terima Kasih </p>";
                  ?>
                  </div>
              </div>
          </div>
      </section> <!-- /.content -->
    </div> <!-- /.container -->
  </div> <!-- /.content-wrapper -->

  <?php
  }
  ?>


  <?php
    break;
    }
    ?>