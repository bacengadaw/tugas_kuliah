<?php 


	session_start();
	// mendapatkan id_produk dari url
	$id_produk = $_GET['id'];

	// jika sudah ada produk itu keranjang .. maka produknya di tambah dengan 1 
	if (isset($_SESSION['keranjang'][$id_produk])) {
		$_SESSION['keranjang'][$id_produk] += 1;
	}
	// selain itu (belum ada keranjang) , maka produk itu di aggap beli cuman 1 
	else{
		$_SESSION['keranjang'][$id_produk] = 1;
	}

	// echo "<pre>";
	// print_r($_SESSION);
	// echo "</pre>";

	// script menuju ke keranjang
	echo "<script>alert('produk telah di masukan ke keranjang');</script>";
	echo "<script>location = 'keranjang.php';</script>";


?>