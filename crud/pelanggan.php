<h1>selamat datang di pelanggan</h1>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Alamat pelanggan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $link->query("SELECT * FROM pelanggan");  ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['email_pelanggan']; ?></td>
			<td><?php echo $pecah['telepon_pelanggan']; ?></td>
			<td><?php echo $pecah['alamat_pelanggan']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=ubahpelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary">Tambah Pelanggan</a>