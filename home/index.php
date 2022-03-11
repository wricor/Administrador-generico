<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Monday, March 07, 2022
* @file home/index.php
* @version 0.1
***********************************************************************/
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION)){
    session_start();
}
require '../config/conection.php';
if(isset($_SESSION["gene01id"])){
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Inicio - Aplicación</title>
	<?php require '../general/head.php'; ?>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<?php
			// Barra superior de la página
			require '../general/navbar.php';
			// Parte superior lateral del menú
			require '../general/sidebar.php';
		?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Contenido del sitio <small>Wricor</small></h1>
						</div>
						<!-- <div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Blank Page</li>
							</ol>
						</div> -->
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">

				<!-- Default box -->
				<!-- <div class="card">
					<div class="card-header">
						<h3 class="card-title">Title</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
							<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
								<i class="fas fa-times"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						Start creating your amazing application!
					</div>
					<div class="card-footer">
						Footer
					</div>
				</div> -->
				<!-- /.card -->

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<?php require '../general/footer.php'; ?>
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<?php require '../general/jsfiles.php'; ?>
</body>

</html>
<?php
} else {
    header("Location:../external/index.php");
}
?>
