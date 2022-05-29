<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA USER //
      case 'view':
      ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Transaksi </h1>
            <!-- <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=trs&act=view">Data Transaksi</a></li>
             </ol> -->
        </section>

<!-- Main content -->
<!-- <section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=trs&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
     -->
      <?php
      break;
      // PROSES TAMBAH Data Transaksi //
      case 'add':
      if (isset($_POST['add'])) {

       $status="pinjam";

        $data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * from tblalat where idalat = '$_POST[idalat]'"));
        //$biayasewa = $selisihHari * $data[biayasewa];
         $totalbiaya=$_POST['jmlsewa']*$data[hargasewa]*$_POST['lamasewa'];
     	$tglbatassewa=date("Y-m-d",mktime(0,0,0,date("m"),date("d")+$_POST["lamasewa"],date("Y")));


                $query = mysqli_query($koneksi,"INSERT INTO tbltransaksi VALUES ('$_POST[idtransaksi]',
                '$_POST[nmpenyewa]','$_POST[idalat]','$_POST[tgltransaksiku]',
                '$_POST[lamasewa]','$tglbatassewa','$_POST[jmlsewa]','$totalbiaya','$status')");


                echo "<script>window.location='?pg=trr&act=view'</script>";
              }
              $stokkurang=$data[jml]-$_POST['jmlsewa'];

             $queryupdate=mysqli_query($koneksi,"UPDATE tblalat SET jml='$stokkurang'  WHERE idalat='$_POST[idalat]'");


              ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Transaksi </h1>
            <!-- <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=trs&act=view">Data Transaksi</a></li>
            <li class="active"><a href="#">Tambah Data Transaksi</a></li>
             </ol> -->
        </section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <!-- form start -->
                <form role="form" method = "POST" action="">
                  <div class="box-body">
                  <div class="row">
                  <div class="col-md-6">

                  <div class="form-group">
                      <?php
                      //memulai mengambil datanya
                      $sql = mysqli_query($koneksi,"select * from tbltransaksi");

                      $num = mysqli_num_rows($sql);

                      if($num <> 0)
                      {
                      $kode = $num + 1;
                      }else
                      {
                      $kode = 1;
                      }

                      //mulai bikin kode
                      $bikin_kode = str_pad($kode, 4, "0", STR_PAD_LEFT);
                      $tahun = date('Ymd');
                      $kode_jadi = "TRS$tahun$bikin_kode";

                      ?>
                      <label for="exampleInputEmail1">ID Transaksi</label>
                      <input type="text" class="form-control" id="idtrs" name="idtrs" placeholder="ID Transaksi" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="idtransaksi" name="idtransaksi" placeholder="ID Transaksi" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <?php
                    $tgltrans=date("Y-m-d");
                    ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal</label>
                      <input class="form-control" id="tgltransaksi" name="tgltransaksi"  value="<?php echo $tgltrans?>" type="text" required disabled/>
                  	  <input type="hidden" class="form-control" id="tgltransaksiku" name="tgltransaksiku" placeholder="Tgl Transaksi" value="<?php echo $tgltrans?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                     <?php
					$jsArray = "var DataSewa = new Array();\n";
				  ?>
          <div class="form-group">
                      <label for="exampleInputEmail1">Nama penyewa</label>
                      <input type="text" class="form-control" name="nmpenyewa" id="nmpenyewa" style="width: 100%;" >
                    </div>

                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Nama Penyewa</label>
                      <select class="form-control select2" name="idpenyewa" id="idpenyewa" style="width: 100%;" >
                      <option value="">--- Silahkan Pilih ---</option>
                      <optgroup label="--- Silahkan Pilih ---"> -->
                      <?php
                      $tampil=mysqli_query($koneksi,"SELECT * FROM tblpenyewa  ORDER BY nmpenyewa");
                      while($r=mysqli_fetch_array($tampil)){
                      ?>
                     
                      <?php

                    }
                    ?>
                    </optgroup>
                      </select>
                    </div>

                    </div>
                    <!--//////////////tutup col-md-6 pertama --------- -->
                     <div class="col-md-6">


                    </div>
                    <!--//////////////tutup md-6 -->
                    </div>

                    <!--//////////////tutup row -->
                    <hr>
                    <div class="row">
                    <div class="col-md-6">
                     <?php
					$jsArrayku = "var DataAlat = new Array();\n";
				  ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID alat</label>
                      <select class="form-control select2" name="idalat" id="idalat" style="width: 100%;" onchange="changeValue(this.value)">
                      <option value="">--- Silahkan Pilih ---</option>
                      <optgroup label="--- Silahkan Pilih ---">
                      <?php
                      $tampil=mysqli_query($koneksi,"SELECT * FROM tblalat  ORDER BY idalat");
                      while($r=mysqli_fetch_array($tampil)){
                      ?>
                      <option value="<?php echo $r['idalat']?>"><?php echo $r['idalat'] ?> || <?php echo $r['merk'] ?></option>
                      <?php
                      $jsArrayku .= "DataAlat['" . $r['idalat'] . "'] = { jenis:'".addslashes($r['jenisalat'])."',
                  	  hargasewa:'".addslashes($r['hargasewa'])."', stokalat:'".addslashes($r['jml'])."'};\n";
                    }
                    ?>
                    </optgroup>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Alat</label>
                      <input class="form-control" id="jenisalat" name="jenisalat" placeholder="Jenis Alat" type="text" required disabled/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga Sewa / Hari</label>
                      <input class="form-control" id="hargasewa" name="hargasewa" placeholder="Harga Sewa Perhari" type="text" required disabled/>
                    </div>
                    </div> <!-- md-6-->

                    <div class="col-md-6">
                    	 <div class="form-group">
                      <label for="exampleInputEmail1">Stok Alat</label>
                      <input class="form-control" id="jml" name="jml" placeholder="Stok Alat" type="text" required disabled/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Lama Sewa (Hari)</label>
                      <input class="form-control" id="lamasewa" name="lamasewa" placeholder="Lama Sewa" type="text" required/>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Sewa</label>
                      <input class="form-control" id="jmlsewa" name="jmlsewa" placeholder="Jumlah Sewa" type="text" required/>
                    </div>

                        <script type="text/javascript">
    <?php echo $jsArrayku; ?>
    function changeValue(idalat){
    document.getElementById('jenisalat').value = DataAlat[idalat].jenis;
    document.getElementById('hargasewa').value = DataAlat[idalat].hargasewa;
    document.getElementById('jml').value = DataAlat[idalat].stokalat;

    };
    </script>


                    </div>
                    </div> <!-- row-->

                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->


            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'add' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>

            </form>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
      break;



    // PROSES HAPUS Data Transaksi //
      case 'delete':
      mysqli_query($koneksi,"DELETE FROM tbltransaksi WHERE idtransaksi='$_GET[id]'");
      echo "<script>window.location='home.php?pg=halamanawal'</script>";
      break;

    }
    ?>