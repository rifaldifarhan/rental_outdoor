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
        <center><h1> Data Pengembalian </h1></center>
           
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
   <center> <a href="?pg=pgb&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a></center>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Merk Alat</th>
                        <th>Jenis Alat</th>
                        <th>Jumlah Sewa</th>
                        <th>Tgl Sewa</th>
                        <th>Tgl Batas Sewa</th>
                        <th>Tgl pengembalian</th>
                        <th>Telat</th>
                        <th>Biaya telat</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysqli_query($koneksi,"SELECT * FROM tbltransaksi s join tblalat t
                    on (s.idalat=t.idalat) join tblpenyewa p
                    on (s.nmpenyewa=p.nmpenyewa)  join tblpengembalian g on (s.idtransaksi=g.idtransaksi) order by idpengembalian asc");
                    $no = 1;
                      while ($r=mysqli_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
                        
                        <?php 
                        $tgltransaksi=tgl_indo($r['tgltransaksi']);
                         $tglbatassewa=tgl_indo($r['tglbatassewa']);
                         $tglpengembalian=tgl_indo($r['tglkembali']);
                     
                       
                        ?>
                        <td><?php echo "$r[idtransaksi]"?></td>
                        <td><?php echo "$r[merk]"?></td>
                        <td><?php echo "$r[jenisalat]"?></td>
                        <td><?php echo "$r[jmlsewa]"?></td>
                        <td><?php echo "$tgltransaksi"?></td>
                        <td><?php echo "$tglbatassewa "?></td>
                        <td><?php echo "$tglpengembalian "?></td>
                        <td><?php echo "$r[telat] "?></td>
                        <td><?php echo "Rp.". number_format("$r[biayatelat]",'0','.','.')?></td>
                        
                        <td><a href="?pg=pgb&act=delete&id=<?php echo $r['idpengembalian']?>"><button type="button" class="btn btn-success" onclick="return confirm('Apakah anda yakin akan menghapusnya?');">Hapus</button></a></td>
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
      // PROSES TAMBAH Data Transaksi //
      case 'add':
      if (isset($_POST['add'])) {
     
        $data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * from tblalat where idalat = '$_POST[idalat]'"));          
        //$biayasewa = $selisihHari * $data[biayasewa];

                $query = mysqli_query($koneksi,"INSERT INTO tblpengembalian VALUES ('$_POST[idpengembalian]',
                '$_POST[idtransaksi]','$_POST[tglkembali]','$_POST[telat]',
                '$_POST[biayatelat]','$_POST[jumlahsewa]')");

                
                echo "<script>window.location='home.php?pg=pgb&act=view'</script>";
              }
            $stoktambah=$data[jml]+$_POST['jumlahsewa'];
             $queryupdate=mysqli_query($koneksi,"UPDATE tblalat SET jml='$stoktambah'  WHERE idalat='$_POST[idalat]'");

             $status="kembali";
             $queryupdatestatus=mysqli_query($koneksi,"UPDATE tbltransaksi SET status='$status'  WHERE idtransaksi='$_POST[idtransaksi]'");

              
              ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data  Pengembalian </h1>
           
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
                      $sql = mysqli_query($koneksi,"select * from tblpengembalian");
                      
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
                      $tahun = date('Ym');
                      $kode_jadi = "pgb$tahun$bikin_kode";

                      ?>
                      <label for="exampleInputEmail1">ID Pengembalian</label>
                      <input type="text" class="form-control" id="idpgb" name="idpgb" placeholder="ID Pengembalian" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="idpengembalian" name="idpengembalian" placeholder="ID Pengembalian" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    
                     <?php 
					$jsArray = "var DataSewa = new Array();\n";
				  ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">NO Transaksi</label>
                      <select class="form-control select2" name="idtransaksi" id="idtransaksi" style="width: 100%;" onchange="changeValue(this.value)">
                      <option value="">--- Silahkan Pilih ---</option>
                      <optgroup label="--- Silahkan Pilih ---">
                      <?php
                      $tampil=mysqli_query($koneksi,"SELECT * FROM tbltransaksi s join tblpenyewa p
                    on (s.nmpenyewa=p.nmpenyewa) join tblalat a on (s.idalat=a.idalat) Where status='pinjam' order by idtransaksi");

                      

                      while($r=mysqli_fetch_array($tampil)){
                        //tanggal hari ini, untuk mencari selisih apakah pengembalian terlambat atau tidak. 
                        //jika telat maka tgl hari ini - batas sewa, jika tidak maka telat=0
                        $tgl=date("Y-m-d");
                        $tglbts=$r['tglbatassewa'];
                        if($tgl>=$tglbts){
                          $selisihHari = (strtotime($tgl)-strtotime($tglbts))/(60*60*24);
                        } else{
                          $selisihHari = 0;
                        }
                        //menhitung biaya telat (jika telat), harga sewa perhari dikali telat
                        $hargasewa=$r['hargasewa'];
                        $biayatelat=$selisihHari*$hargasewa;
                        
                      ?>
                      <option value="<?php echo $r['idtransaksi']?>"><?php echo $r['idtransaksi'] ?></option>
                      <?php
                      $jsArray .= "DataSewa['" . $r['idtransaksi'] . "'] = {namamerk:'".addslashes($r['merk'])."',
                   jenisalat:'".addslashes($r['jenisalat'])."', jmlsewa:'".addslashes($r['jmlsewa'])."',nama:'".addslashes($r['nmpenyewa'])."',
                   tglsewa:'".addslashes($r['tgltransaksi'])."',tglbatas:'".addslashes($r['tglbatassewa'])."',
                   telat:'".addslashes($selisihHari)."',biayatelat:'".addslashes($biayatelat)."',idalat:'".addslashes($r['idalat'])."'};\n";
                    }
                    ?>
                    </optgroup>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Penyewa</label>
                      <input class="form-control" id="nmpenyewa" name="nmpenyewa" placeholder="Nama Penyewa" type="text" required disabled/>
                    </div>

                   <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Id alat</label> -->
                      <input class="form-control" id="idalatku" name="idalatku" placeholder="ID" type="hidden" required disabled/>
                      <input class="form-control" id="idalat" name="idalat" placeholder="ID" type="hidden" required/>
                 <!--   </div>  -->

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Alat</label>
                      <input class="form-control" id="merk" name="merk" placeholder="PT." type="Spesifikasi/ Merk" required disabled/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Alat</label>
                      <input class="form-control" id="jenisalat" name="jenisalat" placeholder="Jenis Alat" type="text" required disabled/>
                    </div>
                <!--    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Sewa</label> -->
                      <input class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Sewa" type="hidden" required disabled/>
                      <input class="form-control" id="jumlahsewa" name="jumlahsewa" placeholder="Jumlah Sewa" type="hidden" required/>
               <!--     </div>  -->

                    </div>
                    <!--//////////////tutup col-md-6 pertama --------- -->
                     <div class="col-md-6">
                 
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Sewa</label>
                      <input class="form-control" id="tglsewa" name="tglsewa" placeholder="Tanggal Sewa" type="text" required disabled/>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Batas Pinjam</label>
                      <input class="form-control" id="tglbatas" name="tglbatas" placeholder="Batas Pinjam" type="text" required disabled/>
                    </div>
                    <?php
                    $tglkembali = date('Y-m-d');
                    ?>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal kembali</label>
                      <input class="form-control" id="date" name="tglkembali" value="<?php echo $tglkembali ;?>" type="text" required disabled/>
                      <input class="form-control" id="date" name="tglkembali" value="<?php echo $tglkembali ;?>" type="hidden" required/>
                    </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Telat ( Hari )</label>
                      <input class="form-control" id="telat" name="telat" Placeholder="Telat" type="text" required disabled/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Biaya Telat</label>
                      <input class="form-control" id="biayatelat" name="biayatelat" Placeholder="Biaya Telat Mengembalikan" type="text" required disabled/>
                     </div> 
                   <!-- <div class="form-group">
                      <label for="exampleInputEmail1">trs</label>
                      <input class="form-control" id="trs" name="trs" Placeholder="Biaya Telat Mengembalikan" type="text" required/>
                     </div> -->
                    <script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(idtransaksi){ 
    document.getElementById('nmpenyewa').value = DataSewa[idtransaksi].nama;
    document.getElementById('merk').value = DataSewa[idtransaksi].namamerk;
    document.getElementById('idalat').value = DataSewa[idtransaksi].idalat;
    document.getElementById('jenisalat').value = DataSewa[idtransaksi].jenisalat; 
    document.getElementById('jumlahsewa').value = DataSewa[idtransaksi].jmlsewa;
    document.getElementById('tglbatas').value = DataSewa[idtransaksi].tglbatas;
    document.getElementById('tglsewa').value = DataSewa[idtransaksi].tglsewa;
    document.getElementById('telat').value = DataSewa[idtransaksi].telat;
    document.getElementById('biayatelat').value = DataSewa[idtransaksi].biayatelat;
  
    }; 
    </script>  
                    </div>
                    <!--//////////////tutup md-6 -->
                    </div>

                    <!--//////////////tutup row -->
                   

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
      
      

    // PROSES HAPUS Data pengembalian //
      case 'delete':
      mysqli_query($koneksi,"DELETE FROM tblpengembalian WHERE idpengembalian='$_GET[id]'");
      echo "<script>window.location='home.php?pg=pgb&act=view'</script>";
      break;

    }
    ?>