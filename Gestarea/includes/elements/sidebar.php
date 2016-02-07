
<div class="sidebar">

	<!-- Nombre y cargo -->
	<div class="row">
		<div class="text-center margin-top-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					<span class="usuarioNombre"><?php echo $usuario->nombre; ?></span>
				</div>
				<div class="panel-body">
					<span class="usuarioCargo"><?php echo $usuario->getCargo(); ?></span>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Buscar -->
	<div class="row">
		<div class="text-center magin-top-3">
			<div class="col-xs-10 col-xs-offset-1">
				<div class="well font-well-sidebar clickable" data-href="/Gestarea/vista/buscar.php">
					<div class="col-xs-8">
						<p class="text-left">Buscar</p>
					</div>
					<div class="text-right">
						<span class="glyphicon glyphicon-search"></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Perfil -->
	<div class="row">
		<div class="text-center magin-top-3">
			<div class="col-xs-10 col-xs-offset-1">
				<div class="well font-well-sidebar clickable" data-href="/Gestarea/vista/perfil.php">
					<div class="col-xs-8">
						<p class="text-left">Perfil</p>
					</div>
					<div class="text-right">
						<span class="glyphicon glyphicon-user"></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Tareas -->
	<div class="row">
		<div class="text-center magin-top-1">
			<div class="col-xs-10 col-xs-offset-1">
				<div class="well font-well-sidebar well-selected clickable" data-href="/Gestarea/vista/lista-tareas.php">
					<div class="col-xs-8">
						<p class="text-left">Tareas</p>
					</div> 
					<div class="text-right">
						<span class="glyphicon glyphicon-tasks"></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cerrar Sesion -->
	<div class="row">
		<div class="text-center magin-top-1">
			<div class="col-xs-10 col-xs-offset-1">
				<div class="well font-well-sidebar close-session" data-href="/Gestarea/index.php">
					<div class="col-xs-8">
						<p class="text-left">Salir</p> 
					</div>
					<div class="text-right">
						<span class="glyphicon glyphicon-off"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
