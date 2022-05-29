<?php
  include "koneksi.php";
   //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>daftar alat</title>
    <style type="text/css">
      * {
        font-family: 'Poppins', sans-serif;
      }
      h1 {
        text-transform: uppercase;
        color: #130f40;
      }
    table {
      border: solid 1px #3EB2FD;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #3EB2FD;
        border: solid 1px #DDEEEE;
        color:#130f40;;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
  <body>
    <H1>data Barang</H1>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>merk/nama alat</th>
          <th>jenis alat</th>
          <th>Harga Sewa</th>
          <th>Jumlah</th>
          <th>Gambar</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM tblalat ORDER BY idalat ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          
          <td><?php echo $row['merk']; ?></td>
          <td><?php echo $row['jenisalat']; ?></td>
          <td>Rp <?php echo number_format($row['hargasewa'],0,',','.'); ?></td>
          <td><?php echo $row['jml']; ?></td>
          <td style="text-align: center;"><img src="page/gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>