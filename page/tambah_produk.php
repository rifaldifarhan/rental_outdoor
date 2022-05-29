<?php
  include "koneksi.php"; //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color:#10221b;
      }
    button {
          background-color: ;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color:;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Produk</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- <div>
          <label>ID Alat</label>
          <input type="text" name="idalat" autofocus="" required="" />
        </div> -->
        <div>
          <label>Merk/Nama alat </label>
         <input type="text" name="merk" />
        </div>
        <div>
          <label>Jenis Alat</label>
         <input type="text" name="jenisalat" required="" />
        </div>
        <div>
          <label>Harga Sewa</label>
         <input type="text" name="hargasewa" required="" />
        </div>
        <div>
          <label>Jumlah Alat</label>
         <input type="text" name="jml" required="" />
        </div>
        <div>
          <label>Gambar Produk</label>
         <input type="file" name="gambar_produk" required="" />
        </div>
        <div>
         <button type="submit" class="btn btn-info">Simpan Produk</button>
        </div>
        </section>
      </form>
  </body>
</html>