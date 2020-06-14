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
					<div class="panel-title">Alterar Ajuda</div>
				</div>
  				<div class="panel-body">
                    <fieldset>
                        <div class="form-group">
                            <label>Ajuda Título</label>
                            <input class="form-control" id="input-titulo" type="text">
                        </div>
                        <div class="form-group">
                            <label>Descrição</label>
                            <input class="form-control" id="input-descricao" type="text">
                        </div>
                        <input type="hidden" id="input-id" value="<?php echo $_GET['id']?>">
                        <div class="form-group">
                            <label>Ajuda do Pai?</label>
                            <select class="form-control" id="select-ajuda-do-pai">
                                <option value="S">Sim</option>
                                <option value="N">Não</option>
                            </select>
                        </div>
                    </fieldset>
                    <div>
                        <button type="submit" id="btn" class="btn btn-sm btn-success">
                            <i class="fa fa-save"></i>
                            Salvar
                        </button>
                    </div>
  				</div>
  			</div>



		  </div>
		</div>
    </div>

    <?php include './includes/rodape.php' ?>
    <script>
        $(function(){
            var idAjuda = $('#input-id').val();

            $.ajax({
              type: 'GET',
              url: '<?php echo URL_API_FUTURONERD;?>/ajuda/'+idAjuda+'',
              dataType: 'json',
              success: function(req) {
                $('#input-titulo').val(req.titulo);
                $('#input-descricao').val(req.descricao);
                $('#select-ajuda-do-pai').val(req.ajuda_do_pai);
              }
            });
        })

         $('#btn').click(function(){
            var idAjuda = $('#input-id').val();
            var titulo = $('#input-titulo').val();
            var descricao = $('#input-descricao').val();
            var ajuda_do_pai = $('#select-ajuda-do-pai').val();

            if(!titulo.trim() || !descricao.trim()) {
                if(!titulo.trim()) $("#input-titulo").notify("Este campo não pode ficar vazio.", { position:"right" }, "error");
                if(!descricao.trim()) $("#input-descricao").notify("Este campo não pode ficar vazio.", { position:"right" }, "error");
            } else {
            
                $.ajax({
                    url: '<?php echo URL_API_FUTURONERD;?>/ajuda/'+idAjuda+'',
                    dataType: 'json',
                    type: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify({"titulo": titulo, "descricao":descricao, "ajuda_do_pai":ajuda_do_pai}),
                    processData: false,
                    success: function(res){
                        $("#btn").notify("Ajuda " + titulo + " editada com sucesso!", "success");
                    },
                    error: function(erro){
                        $("#btn").notify("Ajuda não editada, tente novamente mais tarde. {"+erro.statusText+"}", "error");
                        console.log(erro);
                    }
                });
            }
        });
    </script>

  </body>
</html>