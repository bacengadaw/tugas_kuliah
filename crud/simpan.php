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