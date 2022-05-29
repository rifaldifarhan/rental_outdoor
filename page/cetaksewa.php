<?php
// sesuai kan root file mPDF anda
$nama_dokumen='Rekap Laporan'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../config/MPDF60/'); //sesuaikan dengan root folder anda
include(_MPDF_PATH . "mpdf.php"); //includekan ke file mpdf
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
ob_start();

//Tuliskan file HTML di bawah sini , sesuai File anda .
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak
masalah.-->
<!--CONTOH Code START-->

<h2 style="text-align:center;"> &nbsp;&nbsp;LAPORAN PENYEWAAN ALAT BERAT <br>DINAS BINA MARGA KABUPATEN CIREBON </h2>
<hr style="height:8px;" />

<br>
<h3 style="text-align:center;"> Laporan Penyewaan Alat Berat</h3>

<?php

// Koneksi ke database //

error_reporting(0);
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";

$tglpenjualanaw = $_POST[tglpenjualanaw];
$tglpenjualanak = $_POST[tglpenjualanak];
?>

<table align="center" cellspacing="5" cellpadding="5" border="1">
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
                        </tr>

                    <?php
                    $no++;
                    }
                    ?>
                    
                    <tr>
                    <td align = "center" colspan="9"> <span style="font-weight:bold">Grand Total </td>
                    
                    <?php
                    $liatHarga=mysql_fetch_array(mysql_query("SELECT sum(totalbiayasewa) as total
                    FROM tbltransaksi WHERE tgltransaksi BETWEEN  '$_POST[tglpenjualanaw]' AND  
                    '$_POST[tglpenjualanak]'
                    order by idtransaksi asc"));
                    ?>
                    <td align="center"><?php echo "Rp.". number_format("$liatHarga[total]",'0','.','.')?></td>
                    </tr>
                    
                    </tbody>
                  </table>
                  <br> <br>
                  <?php 
                  $tanggal =tgl_indo(date('Y-m-d'));
                  ?>
                  
                   <table border='0' align='right'>
<tr>
<br>
<th> Cirebon,<?php echo "$tanggal";?> 
<h4> <center> Ketua Dinas Bina Marga <br>Kabupaten Cirebon</center></h4> 
<br>
<br>
<br>
<br>
<br>
.........................
</th>
</tr>
</table>

<?php
//Batas file sampe sini
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//$stylesheet = file_get_contents('css/zebra.css');
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>