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
					<div class="panel-title">Incluir Nova Ajuda</div>
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
                            <div class="form-group">
                                <label>Ajuda do Pai?</label>
                                <select class="form-control" id="select-ajuda-do-pai">
                                  <option value="S">Sim</option>
                                  <option value="N">Não</option>
                                </select>
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
        var ajuda_titulo = $('#input-titulo').val();
        var ajuda_descricao = $('#input-descricao').val();
        var ajuda_do_pai = $('#select-ajuda-do-pai').val();

        if(!ajuda_titulo.trim() || !ajuda_descricao.trim()) {
          $("#input-titulo").notify("Este campo não pode ficar vazio.", { position:"right" }, "error");
          $("#input-descricao").notify("Este campo não pode ficar vazio.", { position:"right" }, "error");
        } else {
          // var ajuda = {
          //   "titulo":ajuda_titulo,
          //   "descricao":ajuda_descricao
          // }
          $.ajax({
            url: '<?php echo URL_API_FUTURONERD;?>/ajuda',
            dataType: 'json',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify({"titulo": ajuda_titulo, "descricao":ajuda_descricao, "ajuda_do_pai":ajuda_do_pai}),
            processData: false,
            success: function(res){
              $("#btn").notify("Ajuda "+ ajuda_titulo +" cadastrada com sucesso!", "success");
              $("#input-titulo").val("");
              $("#input-descricao").val("");
              $("#select-ajuda-do-pai").val("S");
            },
            error: function(erro){
              $("#btn").notify("Ajuda não cadastrada, tente novamente mais tarde. {"+erro.statusText+"}", "error");
              console.log(erro);
            }
          });
        }
      });

    </script>

  </body>
</html>