<?php

	$ambil = $link->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();

?>

<form method="post" enctype="multipart/form-data">
	<h1>Ubah Nama pelanggan kamu</h1>
	<div class="form-group">
		<label>Nama Pelanggan</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Email Pelanggan</label>
		<input type="email" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Telepon Pelanggan</label>
		<input type="text" name="telepon" class="form-control" value="<?php echo $pecah['telepon_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Alamat Pelanggan</label>
		<input type="text" name="alamat" class="form-control" value="<?php echo $pecah['alamat_pelanggan']; ?>">
	</div>
	<button type="" class="btn btn-primary" name="ubah">Ubah</button>

</form>

<?php 
if (isset($_POST['ubah'])) {


	$link->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]', email_pelanggan='$_POST[email]', telepon_pelanggan='$_POST[telepon]', alamat_pelanggan='$_POST[alamat]' WHERE id_pelanggan='$_GET[id]'");
	
	echo "<script>alert('data pelanggan anda telah di ubah');</script>";
	echo "<script>location = 'index.php?halaman=pelanggan';</script>";
}

?>