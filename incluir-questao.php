<?php require_once("config.php") ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Futuro Nerd</title>
    <!-- jQuery UI -->
    <link href="css/jquery-ui.css" rel="stylesheet" media="screen">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <?php include './includes/topo.php' ?>
	<!-- fecha head com o include -->

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<?php include './includes/barra.php' ?>
		  </div>
		  <div class="col-md-10">


  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Incluir Nova Questão</div>
				</div>
  				<div class="panel-body div">
                  <form action="valida-questao.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <label style="display:block;">Série</label>
                                <select name="serie" id="slc-serie" class="selectpicker" data-live-search="true">

                                </select>
                            </div>
                            <div class="form-group">
                                <label style="display:block;">Matéria</label>
                                <select name="materia" id="slc-materia" class="selectpicker" data-live-search="true">
                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tempo</label>
                                <input type="number" class="form-control" id="tempo" name="tempo" min="30" required></input>
                            </div>
                            <div class="form-group">
                                <label>Pergunta</label>
                                <textarea class="form-control" id="titulo" name="titulo" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Imagem</label>
                                <input type="file" id="imagem" name="imagem">
                                <div id="img">
                                    <img src="" id="preview" alt="">
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label>Questão</label>
                                <textarea class="form-control" id="questao" name="questao" rows="7" cols="400"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Respostas</label>
                                <div class="input-group has-error">
                                    <textarea class="form-control" id="errada1" name="errada1" rows="4" required></textarea>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-remove-circle"></i></span>
                                </div><br>
                                <div class="input-group has-error">
                                    <textarea class="form-control" id="errada2" name="errada2" rows="4" required></textarea>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-remove-circle"></i></span>
                                </div><br>
                                <div class="input-group has-error">
                                    <textarea class="form-control" id="errada3" name="errada3" rows="4" required></textarea>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-remove-circle"></i></span>
                                </div><br>
                                <div class="input-group has-success">
                                    <textarea class="form-control" id="correta" name="correta" rows="4" required></textarea>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok-circle"></i></span>
                                </div>
                            </div>
                        </fieldset>
                        <div>
                            <button type="submit" class="btn btn-sm btn-success">
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
    <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="js/editors.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script>

    function previewIMG(input){
        if(input.files && input.files[0]){
            var leitor = new FileReader();

            leitor.onload = function(e){
                $("#preview").attr('src', e.target.result);

                $("#preview").hide();
                $("#preview").fadeIn(650);
            }
            leitor.readAsDataURL(input.files[0]);
        }
    }

    $("#imagem").change(function() {
        previewIMG(this);
    });
        
    $.getJSON("<?php echo URL_API_FUTURONERD;?>/serie", function(data){
        $.each(data, function(i, item){
            $('<option/>',{value:item.id,text:item.serie}).appendTo('#slc-serie').selectpicker('refresh');
        });
        $('#slc-serie').selectpicker('refresh');
    });
    $.getJSON("<?php echo URL_API_FUTURONERD;?>/materia", function(data){
        $.each(data, function(i, item){
            $('<option/>',{value:item.id,text:item.materia}).appendTo('#slc-materia');
        });
        $('#slc-materia').selectpicker('refresh');
    });
    </script>
  </body>
</html>