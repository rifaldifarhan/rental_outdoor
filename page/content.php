<?php 
/**
 * Aplikasi Insentif
 * 
 * 
 * 
 * @author B.E.
 */
if (!isset($_GET['pg'])) {
	include 'dashboard.php';
} else {
	switch ($_GET['pg']) {
		case 'dashboard':
			include 'dashboard.php';
			break;

		case 'data_alat':
				include 'dataalat.php';
				break;
				
		case 'tambah_produk':
			include 'tambah_produk.php';
			break;
		case 'edit_produk':
				include 'edit_produk.php';
				break;
	
		case 'adm':
			include 'dt_admin.php';
			break;

		case 'pytr':
			include 'dt_penyewa.php';
			break;

		case 'ktgr':
			include 'dt_kategori.php';
			break;

		case 'alat':
			include 'dt_alat.php';
			break;
			
		case 'trs':
			include 'dt_transaksi.php';
			break;

		case 'pgb':
			include 'dt_pengembalian.php';
			break;

		case 'lpp':
			include 'lap_penyewaan.php';
			break;

		case 'rl':
			include 'rekap_lap.php';
			break;


		default:	        
	    	echo "<label>404 Halaman tidak ditemukan</label>";
	    break;
		
	}
}

?>