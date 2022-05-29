<?php 
if (!isset($_GET['pg'])) {
	include 'halamanawal.php';
} else {
	switch ($_GET['pg']) {
		case 'halamanawal':
			include 'halamanawal.php';
			break;
		case 'daftar_alat':
				include 'alat.php';
				break;
	
		case 'adm':
			include 'dt_admin.php';
			break;

		case 'daftar':
			include 'daftar.php';
			break;

		case 'trs':
			include 'dt_transaksi.php';
			break;
		case 'trr':
			include 'transaksi.php';
			break;
		
		default:	        
	    	echo "<label>404 Halaman tidak ditemukan</label>";
	    break;
		
	}
}

?>