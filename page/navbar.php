<!-- Navigation -->

  <nav class="navbar navbar-expand-lg navbar-light fixed-top  py-1" id="mainNav" style="background-color: #e67e22; z-index: 9999;">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="" style="  color: #130f40;">Rental<span class="text-primary">Outdoor</span></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
        <li class="nav-item">
            <a class="nav-link text-dark" href="?pg=dashboard" style="text-shadow: 0px 0px 0px #757575;">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="?pg=data_alat" style="text-shadow: 0px 0px 0px #757575;">Data alat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="?pg=pytr&act=view" style="text-shadow: 0px 0px 0px #757575;"> Data Penyewa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="?pg=trs&act=view" style="text-shadow: 0px 0px 0px #757575;">Penyewaan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="?pg=pgb&act=view" style="text-shadow: 0px 0px 0px #757575;">Pengembalian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="?pg=adm&act=view" style="text-shadow: 0px 0px 0px #757575;">Data Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="logout.php" style="text-shadow: 0px 0px 0px #757575;">Sign out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php 
  include 'koneksi.php'; 
  function rupiah($angka){    
          $hasil_rupiah = "Rp " . number_format($angka);
          $rupiah=str_replace(',', '.', $hasil_rupiah);
          return $rupiah;     
        }
  ?>