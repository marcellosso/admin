<?php
@session_start();
if(empty($_SESSION['email'])){
	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Futuro Nerd</title>

	<?php include './includes/topo.php' ?>
	<!-- fecha head com o include -->

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<?php include './includes/barra.php' ?>
		  </div>
		  <div class="col-md-10">
		  	<div class="row">
				<div class="col-md-6">
					<div class="content-box-header">
						<div class="panel-title">Usuários do Aplicativo</div>
							
						<div class="panel-options">
							<a href="usuarios.php" data-rel="link"><i class="far fa-eye link-cor"></i></a>
						</div>
					</div>
					<div class="content-box-large box-with-header">
						<i class="fas fa-user-check icon-grande"></i>	
						<?php
							include('./db.php');
							$sql = 'SELECT * FROM clientes_pais';
							$query = $mysqli->query($sql);
							$nTotal = $query->num_rows;
						?>
						<span class="text-dash-user"><?php echo $nTotal; ?>&nbsp;<?php echo ($nTotal > 1)? 'Usuarios' : 'Usuario' ?></span>					
					</div>
				</div>
				<div class="col-md-3">
					<div class="content-box-header">
						<div class="panel-title">Adicionar Admin</div>
					</div>
					<div class="content-box-large box-with-header">
						<a href="incluir-usuario.php">
							<button class="btn btn-lg btn-block btn-success">
								<i class="fas fa-user-plus fa-lg"></i>
							</button>
						</a>			
					</div>
				</div>
			</div>

		  	<!-- <div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">New vs Returning Visitors</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="fas fa-sync"></i></a>
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						</div>
		  			</div>
		  			 <div class="content-box-large box-with-header">
			  			Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
						<br /><br />
					</div>
		  		</div> -->
		  	</div>
		  </div>
		</div>
    </div>

	<?php include './includes/rodape.php' ?>
  </body>
</html>