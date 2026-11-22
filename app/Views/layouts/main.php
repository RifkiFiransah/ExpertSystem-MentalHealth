<!DOCTYPE html>
<html lang="id">

<head>
	<title><?= $title; ?></title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Antarmuka admin MentalCare untuk mengelola data diagnosa, gejala, penyakit, aturan, dan pengguna.">
	<link rel="shortcut icon" href="<?= base_url('assets/images/logo/logo-2.jpg'); ?>">

	<!-- FontAwesome JS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script defer src="<?= base_url('assets/plugins/fontawesome/js/all.min.js'); ?>"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="<?= base_url('assets/css/portal.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/admin.css'); ?>">

</head>

<body class="app">
	<a href="#main-content" class="skip-link">Lewati ke konten</a>
	<!-- Header -->
	<?= $this->include('layouts/header'); ?>
	<!-- End Header -->

	<!-- SideBar -->
	<?= $this->include('layouts/sidebar'); ?>
	<!-- End Sidebar -->

	<div class="app-wrapper">

		<main id="main-content" class="app-content pt-3 p-md-3 p-lg-4">
			<h1 class="visually-hidden"><?= $title; ?></h1>
			<?= $this->renderSection('content'); ?>
		</main><!--//app-content-->

		<!-- Footer -->
		<?= $this->include('layouts/footer');; ?>
		<!-- End Footer -->

	</div><!--//app-wrapper-->


	<!-- Javascript -->
	<script src="<?= base_url('assets/plugins/popper.min.js'); ?>"></script>
	<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

	<!-- Page Specific JS -->
	<script src="<?= base_url('assets/js/app.js'); ?>"></script>

</body>

</html>