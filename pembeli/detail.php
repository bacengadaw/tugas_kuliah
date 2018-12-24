	 <?php
	  $ambil = $link->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
	  $detail = $ambil->fetch_assoc();
  ?>
  <p>
    Nama Pembeli : <?php echo $detail['nama_pelanggan']; ?> <br>
    Telepon Pembeli : <?php echo $detail['telepon_pelanggan']; ?> <br>
    email pembeli : <?php echo $detail['email_pelanggan'] ; ?> <br>
    Tanggal Pembelian : <?php echo $detail['tanggal_pembelian']; ?> <br>
  </p>          
	<table class="table table-bordered">
    <thead>
      		<tr>
				<th>no</th>
				<th>Nama produk</th>
				<th>Harga</th>
				<th>Jumlah Pembelian</th>
				<th>Subtotal</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor = 1; ?>
			<?php $ambil = $link->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
			<?php while($pecah = $ambil->fetch_assoc()){ ?>
			<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama_produk']; ?></td>
					<td><?php echo $pecah['harga_produk']; ?></td>
					<td><?php echo $pecah['jumlah']; ?></td>
					<td>
            			<?php echo $pecah['harga_produk']*$pecah['jumlah']; ?>
					</td>
					<td>
						<a href="index.php?halaman=hapuspembelian&id=<?php echo $pecah['id_pembelian']; ?>" class="btn-danger btn">Hapus</a>
				        <a href="index.php?halaman=ubahpembelian&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-warning">Ubah</a>
					</td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>
	<a href="#" class="btn btn-primary">Tambah Pembelian produk</a>