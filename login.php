<!DOCTYPE html>
<html>
  <head>
    <title>Login | Futuro Nerd</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<div class="header login">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
					<!--<div class="logo text-center">
						<h1><a href="#">Futuro Nerd</a><span class="txt-top-span">Administração</span></h1>
					</div>-->
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container" style="padding-top:50px;">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <img src="./images/logo_h.jpg" height="80" style="margin-bottom:30px;"/>
							<form action="valida-login.php" method="post">
								<input class="form-control" type="email" name="email" placeholder="E-mail" required><br>
								<input class="form-control" type="password" name="senha" placeholder="Senha" required>
								<div class="action">
									<button class="btn btn-primary signup" type="submit">Entrar</button>
								</div>        
							</form>        
			            </div>
			        </div>
			        <!-- <div class="already">
			            <p>Don't have an account yet?</p>
			            <a href="signup.html">Sign Up</a>
			        </div> -->
			    </div>
			</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>