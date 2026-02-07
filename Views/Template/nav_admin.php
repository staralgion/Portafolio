		<!-- ========== Left Sidebar Start ========== -->
		<div class="vertical-menu">

			<div data-simplebar class="h-100">

				<!--- Sidemenu -->
				<div id="sidebar-menu">
					<!-- Left Menu Start -->
					<ul class="metismenu list-unstyled" id="side-menu">
						<li class="menu-title">Principal</li>

						<li>
							<a href="<?= base_url() ?>/Dashboard" class="waves-effect">
								<i class="mdi mdi-view-dashboard"></i>

								<span>Dashboard</span>
							</a>
						</li>

						<?php if (!empty($_SESSION['permisos'][1]['r']) || !empty($_SESSION['permisos'][2]['r']) || !empty($_SESSION['permisos'][3]['r'])) { ?>
							<li>
								<a href="javascript: void(0);" class="has-arrow waves-effect">
									<i class="mdi mdi-account-multiple"></i>
									<span>Usuarios</span>
								</a>
								<ul class="sub-menu" aria-expanded="false">

									<?php if (!empty($_SESSION['permisos'][1]['r'])) { ?>
										<li><a href="<?= base_url() ?>/Personal">Personal</a></li>
									<?php } ?>

									<?php if (!empty($_SESSION['permisos'][2]['r'])) { ?>
										<li><a href="<?= base_url() ?>/Clientes">Clientes</a></li>
									<?php } ?>

									<?php if (!empty($_SESSION['permisos'][3]['r'])) { ?>
										<li><a href="<?= base_url() ?>/Roles">Roles</a></li>
									<?php } ?>
								</ul>
							</li>
						<?php } ?>



						<?php if (!empty($_SESSION['permisos'][4]['r']) || !empty($_SESSION['permisos'][5]['r']) || !empty($_SESSION['permisos'][6]['r'])) { ?>
							<li>
								<a href="javascript: void(0);" class="has-arrow waves-effect">
									<i class="mdi mdi-account-multiple"></i>
									<span>Productos</span>
								</a>
								<ul class="sub-menu" aria-expanded="false">
									<?php if (!empty($_SESSION['permisos'][5]['r'])) { ?>
										<li><a href="<?= base_url() ?>/Productos">Productos</a></li>
									<?php } ?>

									<?php if (!empty($_SESSION['permisos'][6]['r'])) { ?>
										<li><a href="<?= base_url() ?>/Marcas">Marcas</a></li>
									<?php } ?>

									<?php if (!empty($_SESSION['permisos'][4]['r'])) { ?>
										<li><a href="<?= base_url() ?>/Categorias">Categorias</a></li>
									<?php } ?>
								</ul>
							</li>
						<?php } ?>

						<?php if (!empty($_SESSION['permisos'][7]['r']) || !empty($_SESSION['permisos'][9]['r']) || !empty($_SESSION['permisos'][10]['r'])) { ?>
							<li>
								<a href="javascript: void(0);" class="has-arrow waves-effect">
									<i class="mdi mdi-account-multiple"></i>
									<span>Solicitudes</span>
								</a>

								<ul class="sub-menu" aria-expanded="false">

									<?php if (!empty($_SESSION['permisos'][7]['r'])) { ?>
										<li><a href="<?= base_url() ?>/Prioridades">Prioridades</a></li>
									<?php } ?>
									<?php if (!empty($_SESSION['permisos'][9]['r'])) { ?>
										<li><a href="<?= base_url() ?>/Solicitudes">Solicitudes</a></li>
									<?php } ?>
									<?php if (!empty($_SESSION['permisos'][10]['r'])) { ?>
										<li><a href="<?= base_url() ?>/Asignaciones">Asignaciones</a></li>
									<?php } ?>

								</ul>
							</li>
						<?php } ?>


						<?php if (!empty($_SESSION['permisos'][11]['r'])) { ?>
							<li>
								<a href="<?= base_url() ?>/Solicitud">
									<i class="mdi mdi-account-multiple"></i>
									<span>Solicitud</span>
								</a>

							</li>
						<?php } ?>


						<?php if (!empty($_SESSION['permisos'][12]['r'])) { ?>
							<li>
								<a href="<?= base_url() ?>/Aprendizaje">
									<i class="mdi mdi-account-multiple"></i>
									<span>Aprendizaje</span>
								</a>

							</li>
						<?php } ?>
					</ul>
				</div>
				<!-- Sidebar -->
			</div>
		</div>
		<!-- Left Sidebar End -->

		<div class="main-content" id="result">