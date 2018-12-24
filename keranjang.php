<?php
	
	session_start();

	$link = new mysqli("localhost" , "root", "baceng", "magang" );

	if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
		echo "<script>alert('keranjang kamu kosong, kamu harus belanja dulu');</script>";
		echo "<script>location = 'index.php';</script>";
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Magang.com</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<!-- <div class="top_nav_left">free shipping on all u.s orders over $50</div> -->
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- Currency / Language / My Account -->


								<li class="account">
									<a href="#">
										Akun Penjual
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="crud/login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
										<li><a href="crud/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="#">Mag<span>ang</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="index.php">home</a></li>
								<li><a href="categories.php">shop</a></li>
								<!-- <li><a href="single.php">pages</a></li> -->
								<li><a href="contact.php">contact</a></li>
								<li><a href="keranjang.php"><i class="glyphicon glyphicon-shopping-cart"></i></a></li>
							</ul>
							<ul class="navbar_user">
								<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
							</ul>
							<ul>
								<?php if(isset($_SESSION["user"])): ?>
									<li><a href="pembeli/index.php" title=""><?php echo $_SESSION['user']; ?></a></li>
								<?php elseif(isset($_SESSION["penjual"])): ?>
									<li> <a href="crud/index.php" title=""><?php echo $_SESSION['penjual']; ?></a></li>
								<?php else: ?>
									<li><a href="pembeli/login.php" title="">Login</a></li>
								<?php endif ?>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="#">
						Magang
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="index.php">Home</a></li>
						<li><a href="categories.php">Shop</a></li>
						<li><a href="single.php">Pages</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="#">
						My Account
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="crud/login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
						<li><a href="crud/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<div class="newsletter">
		<div class="container">
			<div class="row">
			
			</div>
		</div>
	</div>

	<div class="newsletter">
		<div class="container">
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
							<td>
								<a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>" title="" class="btn btn-danger">hapus</a>
							</td>
						</tr>
						<?php $nomor++ ?>
						<?php endforeach ?>
					</tbody>
				</table>

				<a href="index.php" title="" class="btn btn-default">Lanjutkan belanja</a>
				<a href="pembeli/index.php" title="" class="btn btn-primary">Lanjutkan Checkout</a>
			</div>
		</div>
	</div>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<!-- <script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script> -->
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
