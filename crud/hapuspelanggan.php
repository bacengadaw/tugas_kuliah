<?php 

	$ambil = $link->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
	$pecah = $ambil ->fetch_assoc();

	$link->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
	echo "<script>alert('pelanggan dihapus');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";

?>