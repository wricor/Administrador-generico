<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Monday, March 07, 2022
* @file general/sidebar.php
* @version 0.1
***********************************************************************/
?>
<!-- Barra Lateral de Menú -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index.php" class="brand-link">
		<img src="../tools/img/Logo_WJRR_vector_2.png" alt="Logo Wricor" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Wricor</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="align-items-center user-panel mt-3 pb-3 mb-3 d-flex text-center">
			<div class="image">
				<img src="../tools/img/avatar.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?php echo $_SESSION['gene01nombre1']." ".$_SESSION['gene01nombre2']."<br>".$_SESSION['gene01apellido1']." ".$_SESSION['gene01apellido2'] ?></a>
			</div>
		</div>

		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<?php
					// Barra inferior lateral del menú
					require '../general/menu.php';
				?>
			</ul>
		</nav>
		<!-- Sidebar Menu -->

		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>