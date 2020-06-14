<!DOCTYPE html>
<html>

<head>
  <title>Futuro Nerd</title>
  <!-- jQuery UI -->
  <link href="css/jquery-ui.css" rel="stylesheet" media="screen">

  <?php include './includes/topo.php' ?>
  <!-- fecha head com o include -->

  <div class="page-content">
    <div class="row">
      <div class="col-md-2">
        <?php include './includes/barra.php' ?>
      </div>
      <div class="col-md-4 offset-md-3">


        <div class="content-box-large">
          <div class="panel-heading">
            <button class="btn-back btn" onclick="window.history.back();">
              <i class="fa fa-arrow-left"></i>
            </button>
            <div class="panel-title">Incluir Novo Usuário</div>
          </div>
          <div class="panel-body">
          <form action="valida-usuario.php" method="post">
            <fieldset>
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" id="input-nome" name="nome" type="text" required>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" id="input-email" name="email" type="email" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" id="input-senha" name="senha" type="password" required>
                </div>
              
            </fieldset>
            <div>
              <button id="btn" type="submit" class="btn btn-sm btn-success">
                <i class="fa fa-save"></i>
                Cadastrar
              </button>
            </div>
            </form>
          </div>
        </div>



      </div>
    </div>
  </div>

  <?php include './includes/rodape.php' ?>

  </body>

</html>