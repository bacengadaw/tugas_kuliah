<?php 


	require_once "core/init.php";


?>



<div class="row">
	<h1>selamat datang di keranjang</h1>
		<br>
			<table class="table table-border">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subharga</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1; ?>
					<?php foreach ($_SESSION['keranjang'] as $id_produk => $Jumlah): ?>
					<!-- menampilkan datanya -->
					<?php
					$ambil = $link->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
					$pecah = $ambil->fetch_assoc();
					$subharga = $pecah["harga_produk"]*$Jumlah;
					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td> <?php echo $pecah["nama_produk"] ?> </td>
						<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
						<td> <?php echo $Jumlah; ?> </td>
						<td>Rp. <?php echo number_format($subharga); ?> </td>							
					</tr>
					<?php $nomor++ ?>
					<?php $totalbelanja+=$subharga; ?>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Total Pembelanjaan</th>
						<th>Rp. <?php echo number_format($totalbelanja); ?> </th>
					</tr>
				</tfoot>
			</table>

			<form method="post" enctype="multipart/form-data">
			<table>
				<tbody>
					<tr>
						<td colspan="2"><a href="../index.php" title="" class="btn btn-default">Lanjutkan belanja</a></td>
						<td></td>
						<td colspan="8">
							<div class="col-md-16">
								<select name="id_ongkir" class="form-control">
								<option value="">Pilih ongkos kirim</option>
								<?php 
									$ambildata = $link->query("SELECT * FROM ongkir"); 
									while($ongkir1 = $ambildata->fetch_assoc()){
								?>
								<option value="">
									<?php echo $ongkir1['nama_kota']; ?>
									Rp. <?php echo number_format($ongkir1['tarif']); ?>
								</option>
							<?php } ?>
								</select>
							</div>		
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<button class="btn btn-danger" type="submit" name="checkout">Checkout</button>
						</td>
					</tr>
				</tbody>
			</table>
			</form> 

			<?php 

				if (isset($_POST["checkout"])) {
					
					$id_pembeli = $_SESSION["user"]["id_pembeli"];
					$id_ongkir = $_POST['id_ongkir'];
					$tanggal_pembelian = date("Y-m-d");

					$ambil = $link->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
					$dataongkir = $ambil->fetch_assoc();
					$tarif = $dataongkir['tarif'];

					$total_pembelian = $totalbelanja += $tarif;

					// menyimpan data ke table pembelian
					$link->query("INSERT INTO pembelian(id_pembeli, id_ongkir, tanggal_pembelian, total_pembelian)	VALUES ('$id_pembeli', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian')" );

					echo "<script>alert('data anda sudah tersimpan');</script>";
				}

			?>


	</div>

