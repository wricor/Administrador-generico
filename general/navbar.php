<?php
/**
**********************************************************************
* @author William Jammirlhey Rico Ruiz <webmaster@williamrico.com>
* @date Monday, March 07, 2022
* @file general/navbar.php
* @version 0.1
***********************************************************************/
?>
<!-- Barra Superior -->
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
        <div class="content-header-section">
            <input type="hidden" id="useridx" class="form-control" value=<?php echo $_SESSION["gene01id"]?>><!-- ID del Usuario useridx-->
            <input type="hidden" id="usernom1x" class="form-control" value=<?php echo $_SESSION["gene01nombre1"]?>><!-- nom1 del Usuario useridx-->
            <input type="hidden" id="usernom2x" class="form-control" value=<?php echo $_SESSION["gene01nombre2"]?>><!-- nom2 del Usuario useridx-->
            <input type="hidden" id="userape1x" class="form-control" value=<?php echo $_SESSION["gene01apellido1"]?>><!-- ape1 del Usuario useridx-->
            <input type="hidden" id="userape2x" class="form-control" value=<?php echo $_SESSION["gene01apellido2"]?>><!-- ape2 del Usuario useridx-->
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['gene01nombre1']." ".$_SESSION['gene01nombre2']." ".$_SESSION['gene01apellido1']." ".$_SESSION['gene01apellido2'] ?><i class="fa fa-angle-down ml-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
					<!-- Pendiente por configuracion -->
                    <!-- <a class="dropdown-item" href="be_pages_generic_profile.html">
                        <i class="far fa-user mr-1"></i> Perfil
                    </a>
                    <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="../general/logout.php">
                        <i class="fas fa-sign-out-alt mr-1"></i> Cerrar Sesión
                    </a>
                </div>
            </div>
        </div>
	</ul>
</nav>
<!-- /.navbar -->