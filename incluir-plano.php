<?php require_once("config.php") ?>
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
					<div class="panel-title">Incluir Novo Plano</div>
				</div>
  				<div class="panel-body">
                  
                        <fieldset>
                            <div class="form-group">
                                <label>Título</label>
                                <input class="form-control" id="input-titulo" type="text" placeholder="Título" required />
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control span6" rows="3" placeholder="Descrição" required id="input-descricao"></textarea>
                            </div>
                        </fieldset>
                        <div>
                            <button id="btn" class="btn btn-sm btn-success">
                                <i class="fa fa-save"></i>
                                Cadastrar
                            </button>
                        </div>
                 
  				</div>
  			</div>



		  </div>
		</div>
    </div>

    <?php include './includes/rodape.php' ?>

    <script>

      $('#btn').click(function(){
        var plano_titulo = $('#input-titulo').val();
        var plano_descricao = $('#input-descricao').val();

        if(!plano_titulo.trim() || !plano_descricao.trim()) {
          $("#input-titulo").notify("Este campo não pode ficar vazio.", { position:"right" }, "error");
          $("#input-descricao").notify("Este campo não pode ficar vazio.", { position:"right" }, "error");
        } else {

          $.ajax({
            url: '<?php echo URL_API_FUTURONERD;?>/plano',
            dataType: 'json',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify({"titulo": plano_titulo, "descricao":plano_descricao}),
            processData: false,
            success: function(res){
              $("#btn").notify("Plano "+ plano_titulo +" cadastrado com sucesso!", "success");
              $("#input-titulo").val("");
              $("#input-descricao").val("");
            },
            error: function(erro){
              $("#btn").notify("Plano não cadastrado, tente novamente mais tarde. {"+erro.statusText+"}", "error");
              console.log(erro);
            }
          });
        }
      });

    </script>

  </body>
</html>