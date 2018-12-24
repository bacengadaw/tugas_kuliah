<h1>selamat datang di data pembeli</h1>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>Nama Pembeli</th>
			<th>Tanggal</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $link->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pembelian=pelanggan.id_pelanggan WHERE pembelian.id_pembelian");  ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">Detail</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>