<?php
 switch ($_GET['act']) {    
  // PROSES DaftarData penyewa //
  case 'add':
      if (isset($_POST['add'])) {
                $query = mysqli_query($koneksi,"INSERT INTO tblpenyewa VALUES ('$_POST[idpenyewa]',
                '$_POST[nmpenyewa]','$_POST[usia]','$_POST[jenkel]',
                '$_POST[alamat]','$_POST[pekerjaan]','$_POST[contact]','$_POST[perusahaan]')");
              echo "<SCRIPT language=Javascript>
              alert('Data Behasil di simpan')
              </script>
              <meta http-equiv='refresh' content='0; url=?pg=halamanawal'/>";
//check if query successful
// if($query) {
// echo " <center> <b> <font color = 'green' size = '4'> <p> Anda Telah Terdaftar Sebagai Penyewa Alat Berat Di Bina Marga<br>
// Silahkan hubungi Admin untuk menyewa ! </p> </center> </b> </font> <br/>
// <meta http-equiv='refresh' content='2; url=?pg=halamanawal'/> ";
// } else { echo "Data gagal disimpan  <meta http-equiv='refresh' content='2; url=?pg=halamanawal'/>";
// }
              //  echo "<script>window.location='?pg=halamanawal'</script>";
              }
              ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data penyewa </h1>
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
                  <div class="box-body">
                    <div class="form-group">
                      <?php
                      //memulai mengambil datanya
                      $sql = mysqli_query($koneksi,"select * from tblpenyewa");
                      
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
                      $kode_jadi = "penyewa$tahun$bikin_kode";

                      ?>
                      <label for="exampleInputEmail1">ID Penyetor</label>
                      <input type="text" class="form-control" id="idnsbh" name="idnsbh" placeholder="ID Penyetor" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="idpenyewa" name="idpenyewa" placeholder="Nomor Penjualan" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama penyewa</label>
                      <input type="text" class="form-control" id="nmpenyewa" name="nmpenyewa" placeholder="Nama penyewa" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">jenis Kelamin</label> <br>
                      <label class="radio-inline">
                      <input type="radio" name="jenkel" id="jenkel" value="L" required data-fv-notempty-message="Tidak boleh kosong"> Laki-laki 
                      </label>
                      <label class="radio-inline">
                      <input type="radio" name="jenkel" id="jenkel" value="P" required data-fv-notempty-message="Tidak boleh kosong"> Perempuan
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Usia</label>
                      <select class="form-control" name="usia">
                      <option>--- USIA ---</option>
                      <?php
                      for ($i = 18 ; $i<=70 ; $i++){
                      ?>
                      <option value = "<?php echo $i ?>"><?php echo $i?> Tahun</option>
                      <?php
                      }
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="5" placeholder="Alamat" required data-fv-notempty-message="Tidak boleh kosong"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pekerjaan</label>
                      <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact Person</label>
                      <input type="number" class="form-control" id="contact" name="contact" placeholder="Contact Person" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Perusahaan</label>
                      <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Nama Perusahaan" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                     -->
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
      // PROSES EDIT Data penyewa //
      case 'edit':
      $d = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tblpenyewa WHERE idpenyewa='$_GET[id]'"));
            if (isset($_POST['update'])) {          
              mysqli_query($koneksi,"UPDATE tblpenyewa SET nmpenyewa='$_POST[nmpenyewa]',
               usia='$_POST[usia]',jenkel='$_POST[jenkel]',alamat='$_POST[alamat]',
               pekerjaan='$_POST[pekerjaan]',cperson='$_POST[contact]',perusahaan='$_POST[perusahaan]'  
               WHERE idpenyewa='$_POST[id]'");
                echo "<script>window.location='?pg=halamanawal'</script>";            
          }
              ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data penyewa </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=daftar&act=view">Data penyewa</a></li>
            <li class="active">Update Data penyewa</li>
             </ol>
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
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID Penyetor</label>
                      <input type="text" class="form-control" id="idnsbh" name="idnsbh" placeholder="ID Penyetor" value= "<?php echo $d[idpenyewa];?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="idpenyewa" name="idpenyewa" placeholder="ID Penyetor" value= "<?php echo $d[idpenyewa];?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama penyewa</label>
                      <input type="hidden" name="id" value= "<?php echo $d['idpenyewa'];?>">
                      <input type="text" class="form-control" id="nmpenyewa" name="nmpenyewa" placeholder="Nama penyewa" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['nmpenyewa'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kelamin</label> <br>
                      <?php
                      if ($d['jenkel'] == 'L'){
                      ?>
                      <label class="radio-inline">
                      <input type="radio" name="jenkel" id="jenkel" value="L" required data-fv-notempty-message="Tidak boleh kosong" checked> Laki-laki 
                      </label>
                      <label class="radio-inline">
                      <input type="radio" name="jenkel" id="jenkel" value="P" required data-fv-notempty-message="Tidak boleh kosong"> Perempuan
                      </label>
                      <?php
                      } else {
                      ?>
                      <label class="radio-inline">
                      <input type="radio" name="jenkel" id="jenkel" value="L" required data-fv-notempty-message="Tidak boleh kosong"> Laki-laki 
                      </label>
                      <label class="radio-inline">
                      <input type="radio" name="jenkel" id="jenkel" value="P" required data-fv-notempty-message="Tidak boleh kosong" checked> Perempuan
                      </label>
                      <?php
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Usia</label>
                      <select class="form-control" name="usia">
                      <option>--- USIA ---</option>

                      <?php
                      for ($i = 1 ; $i<=99 ; $i++){
                        if ($i==$d[usia]) {
                      ?>
                      <option value = "<?php echo $d[usia] ?>" selected><?php echo $d[usia]?> Tahun</option>
                      <?php
                      } else {
                      ?>
                      <option value = "<?php echo $i?>"><?php echo $i?> Tahun</option>
                      <?php
                      }
                    }
                      ?>
                      
                      </select>
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="5" placeholder="Alamat" required data-fv-notempty-message="Tidak boleh kosong"><?php echo $d[alamat]?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pekerjaan</label>
                      <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['pekerjaan'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact Person</label>
                      <input type="number" class="form-control" id="contact" name="contact" placeholder="Contact Person" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['cperson'];?>">
                    </div>
                     <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Nama Perusahaan</label>
                      <input type="number" class="form-control" id="perusahaan" name="perusahaan" placeholder="Nama Perusahaan" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['perusahaan'];?>">
                    </div> -->
                    
                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->

          
            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name = 'update' class="btn btn-info">Update</button>
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

    // PROSES HAPUS Data penyewa //
      case 'delete':
      mysqli_query($koneksi,"DELETE FROM tblpenyewa WHERE idpenyewa='$_GET[id]'");
      echo "<script>window.location='home.php?pg=daftar&act=view'</script>";
      break;

    }
    ?>