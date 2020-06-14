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
					<div class="panel-title">Alterar Matéria</div>
				</div>
  				<div class="panel-body">
                    <fieldset>
                        <div class="form-group">
                            <label>Matéria</label>
                            <input class="form-control" id="input-materia" type="text">
                            <input type="hidden" id="input-id" value="<?php echo $_GET['id'] ?>">
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
            var id = $('#input-id').val();

            $.ajax({
              type: 'GET',
              url: '<?php echo URL_API_FUTURONERD;?>/materia/'+id+'',
              dataType: 'json',
              success: function(req) {
                $('#input-materia').val(req.materia);
              }
            });
        })

         $('#btn').click(function(){materia
            var materia = $('#input-materia').val();
            var id = $('#input-id').val();

            if(materia.trim() == "") {

            $("#input-materia").notify("Este campo não pode ficar vazio.", { position:"right" }, "error");
            } else {
            
                $.ajax({
                    url: '<?php echo URL_API_FUTURONERD;?>/materia/'+id+'',
                    dataType: 'json',
                    type: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify({"materia": materia}),
                    processData: false,
                    success: function(res){
                        $("#btn").notify("Matéria "+materia+" editada com sucesso!", "success");
                    },
                    error: function(erro){
                        $("#btn").notify("Matéria não editada, tente novamente mais tarde. {"+erro.statusText+"}", "error");
                        console.log(erro);
                    }
                });
            }
        });
    </script>

  </body>
</html>