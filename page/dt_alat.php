<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW Data alat berat //      
      case 'view':
      ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data alat berat </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=alat&act=view">Data alat berat</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=alat&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Alat</th>
                        <th>Spesifikasi/Merk</th>
                        <th>Jenis Alat</th>
                        <th>Harga Sewa/hari</th>
                        <th>Jumlah Stok</th>
                        <th>gambar</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysqli_query($koneksi,"SELECT * FROM tblalat order by idalat asc");
                    $no = 1;
                      while ($r=mysqli_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>
                        <td><?php echo "$r[idalat]"?></td>
                        <td><?php echo "$r[merk]"?></td>
                        <td><?php echo "$r[jenisalat]"?></td>

                        <td><?php echo "Rp.". number_format("$r[hargasewa]",'0','.','.')?></td>
                        <td><?php echo "$r[jml]"?></td>
                        <td><img src="page/gambar/<?php echo $r['gambar']; ?>" height="30" width="30"></td>
                        <td><a href="?pg=alat&act=edit&id=<?php echo $r['idalat']?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                        <td><a href="?pg=alat&act=delete&id=<?php echo $r['idalat']?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
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
      // PROSES TAMBAH Data alat berat //
      
        // include("fungsi_gambar.php");

        // $lokasi_file = $_FILES['fupload']['tmp_name'];
        // $nama_file   = $_FILES['fupload']['name'];
        
        // $id_alat     = $_POST['idalat'];
        // $nama_alat	= $_POST['merk'];
        // $jenis_alat			= $_POST['jenisalat'];
        // $harga			= $_POST['hargasewa'];
        // $jumlah     = $_POST['jml']
        
        // if (empty ($nama_alat) or empty ($ulasan) ) 
        
        // {
        // echo "<script>alert('data tidak boleh kosong');
        // document.location.href='?page=input_alat'; </script>\n"; exit ;
        // }
        
        
        // if (!empty($lokasi_file))
        //    {
        //     UploadFile($nama_file);
        
        //     $query = mysqli_query ($koneksi, 'insert into tblalat (idalat,merk,jenisalat,hargasewa,jml,gambar)values("'.$id_alat .'"
        //     ,"'.$nama_alat.'"
        //     ,"'.$jenis_alat.'"
        //     ,"'.$harga.'"
        //     ,"'.$jumlah .'"
        //     ,"'.$nama_file.'")');
        //     } else {
        //       $query = mysqli_query ($koneksi, 'insert into tblalat (idalat,merk,jenisalat,hargasewa,jml,gambar)values("'.$id_alat .'"
        //       ,"'.$nama_alat.'"
        //       ,"'.$jenis_alat.'"
        //       ,"'.$harga.'"
        //       ,"'.$jumlah .'"
        //       ,"'.$nama_file.'")');
                
        //         }
        
        // if($query) {
        // echo "<script>alert('data berhasil disimpan');
        // document.location.href='?pg=alat&act=view'; </script>\n";
        // }else{
        // echo "<script>alert('data gagal disimpan');
        // document.location.href='?pg=alat&act=view'; </script>\n";
        // }
        case 'add':
          // if (isset($_POST['add']))
         if (isset($_POST['add'])) {
           $query = mysqli_query($koneksi,"INSERT INTO tblalat VALUES ('$_POST[idalat]',
           '$_POST[merk]','$_POST[jenisalat]','$_POST[hargasewa]','$_POST[jml],'$_FILES[gambar]')");
           echo "<SCRIPT language=Javascript>
           alert('Data Behasil di simpan')
           </script>
           <meta http-equiv='refresh' content='0; url=home.php?pg=alat&act=view'/>";
          
         }
        ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data alat berat </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=alat&act=view">Data alat berat</a></li>
            <li class="active"><a href="#">Tambah Data alat berat</a></li>
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
                <form role="form" method = "POST" action="" enctype ="multipart/form-data">
                  <div class="box-body">
                  <div class="box-body">
                  <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                      <?php
                      //memulai mengambil datanya
                      $sql = mysqli_query($koneksi,"select * from tblalat");
                      
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
                      $kode_jadi = "ROOM$tahun$bikin_kode";

                      ?>
                      <label for="exampleInputEmail1">Kode alat</label>
                      <input type="text" class="form-control" id="idalat" name="idalat" placeholder="Kode Alat"  required data-fv-notempty-message="Tidak boleh kosong" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama/Merk alat</label>
                      <input type="text" class="form-control" id="merk" name="merk" placeholder="Nama alat" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis alat</label>
                      <input type="text" class="form-control" id="jenisalat" name="jenisalat" placeholder="Jenis alat" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    </div>
                    <div  class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga Sewa</label>
                      <input type="number" class="form-control" id="hargasewa" name="hargasewa" placeholder="Biaya Sewa" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah</label>
                      <input type="number" class="form-control" id="jml" name="jml" placeholder="Jumlah" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar</label>
                      <input type="file" class="form-control" id="gambar" name="fupload" placeholder="nama_file" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>

                    </div>
                    </div>
                    
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
      // PROSES EDIT Data alat berat //
      case 'edit':
      $d = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tblalat WHERE idalat='$_GET[id]'"));
            if (isset($_POST['update'])) {          
              mysqli_query($koneksi,"UPDATE tblalat SET merk='$_POST[merk]',jenisalat='$_POST[jenisalat]',
               hargasewa='$_POST[hargasewa]' ,jml='$_POST[jml]'
               WHERE idalat='$_POST[idalat]'");
                echo "<script>window.location='home.php?pg=alat&act=view'</script>";            
          }
              ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data alat berat </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=alat&act=view">Data alat berat</a></li>
            <li class="active">Update Data alat berat</li>
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
                  <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode alat</label>
                      <input type="text" class="form-control" id="idalat" name="idalat" placeholder="ID Truk" value= "<?php echo $d[idalat];?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="idalat" name="idalat" placeholder="ID Truk" value= "<?php echo $d[idalat];?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama/Merk alat</label>
                      <input type="hidden" name="id" value= "<?php echo $d['idalat'];?>">
                      <input type="text" class="form-control" id="merk" name="merk" placeholder="Nama alat" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['merk'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jenis alat</label>
                      <input type="hidden" name="id" value= "<?php echo $d['jenisalat'];?>">
                      <input type="text" class="form-control" id="jenisalat" name="jenisalat" placeholder="Nama alat" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['jenisalat'];?>">
                    </div>
                    </div>
                    <div  class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga Sewa</label>
                      <input type="number" class="form-control" id="hargasewa" name="hargasewa" placeholder="Biaya Sewa" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['hargasewa'];?>">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Stok</label>
                      <input type="number" class="form-control" id="jml" name="jml" placeholder="Biaya Sewa" required data-fv-notempty-message="Tidak boleh kosong" value= "<?php echo $d['jml'];?>">
                    </div>


                    </div>
                    </div>
                    
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

    // PROSES HAPUS Data alat berat //
      case 'delete':
      mysqli_query($koneksi,"DELETE FROM tblalat WHERE idalat='$_GET[id]'");
      echo "<script>window.location='home.php?pg=alat&act=view'</script>";
      break;

    }
    ?>