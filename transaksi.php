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
            
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <!-- <a href="?pg=trs&act=add"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a> -->
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode Transaksi</th>
                        <th>Penyewa</th>
                        <th>Merk Alat</th>
                        <th>Jenis Alat</th>
                        <th>Harga/Hari</th>
                        <th>Lama Sewa</th>
                        <th>Batas Sewa</th>
                        <th>Jumlah</th>
                        <th>Total Biaya Sewa</th>
                        <th>Status</th>

                      <!--  <th>Delete</th> -->
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysqli_query($koneksi,"SELECT * FROM tbltransaksi s join tblalat t
                    on (s.idalat=t.idalat) join tblpenyewa p
                    on (s.nmpenyewa=p.nmpenyewa)  order by idtransaksi asc");
                    $no = 1;
                      while ($r=mysqli_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>

                        <?php
                        $tgltransaksi=tgl_indo($r['tgltransaksi']);
                        $tglbatassewa=tgl_indo($r['tglbatassewa']);
                      //  $totalbiaya=$r[jmlsewa]*$r[hargasewa]*$r[lamasewa];

                        ?>

                        <td><?php echo "$tgltransaksi"?></td>
                        <td><?php echo "$r[idtransaksi]"?></td>
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
      <?php
     
    }
    ?>