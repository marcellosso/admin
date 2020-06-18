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

    <?php 
    
        require('db.php');
        $id = $_GET['id'];

        $questao       = 'SELECT * FROM questoes WHERE id = "'.$id.'"';
        $queryQuestao  = $mysqli->query($questao);
        $questao       = $queryQuestao->fetch_assoc();
        
        $titulo     = $questao['titulo'];
        $idSerie    = $questao['id_serie'];
        $idMateria  = $questao['id_materia'];
        $imagem     = $questao['imagem'];
        $questaot   = $questao['questao'];
        $tempo      = $questao['tempo'];
        $errada1    = $questao['resposta_errada'];
        $errada2    = $questao['resposta_errada1'];
        $errada3    = $questao['resposta_errada2'];
        $correta    = $questao['resposta_correta'];  
    
    ?>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<?php include './includes/barra.php' ?>
		  </div>
		  <div class="col-md-10">


  			<div class="content-box-large">
  				<div class="panel-heading">
                  <button class="btn-back btn" onclick="window.history.back();">
                    <i class="fa fa-arrow-left"></i>
                </button>
					<div class="panel-title">Alterar Questão</div>
				</div>
  				<div class="panel-body div">
                  <form action="valida-alterar-questao.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <label style="display:block;">Série</label>
                                <select name="serie" id="slc-serie" class="selectpicker" data-live-search="true">
                                    <?php 
                                        $sqlBuscaSerieAtual = 'SELECT * FROM series WHERE id = '.$idSerie;
                                        $queryBuscaSerieAtual = $mysqli->query($sqlBuscaSerieAtual);
                                        $serieAtual = $queryBuscaSerieAtual->fetch_assoc();
                                        echo '<option value="'.$serieAtual['id'].'">'.$serieAtual['serie'].'</option>';
                                        $sqlBuscaSeries = 'SELECT * FROM series WHERE id NOT IN ('.$idSerie.')';
                                        $queryBuscaSeries = $mysqli->query($sqlBuscaSeries);
                                        while($series = $queryBuscaSeries->fetch_assoc()){
                                            echo '<option value="'.$series['id'].'">'.$series['serie'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label style="display:block;">Matéria</label>
                                <select name="materia" id="slc-materia" class="selectpicker" data-live-search="true">
                                    <?php 
                                        $sqlBuscaMateriaAtual = 'SELECT * FROM materias WHERE id = '.$idMateria;
                                        $queryBuscaMateriaAtual = $mysqli->query($sqlBuscaMateriaAtual);
                                        $materiaAtual = $queryBuscaMateriaAtual->fetch_assoc();
                                        echo '<option value="'.$materiaAtual['id'].'">'.$materiaAtual['materia'].'</option>';
                                        $sqlBuscaMaterias = 'SELECT * FROM materias WHERE id NOT IN ('.$idMateria.')';
                                        $queryBuscaMaterias = $mysqli->query($sqlBuscaMaterias);
                                        while($materias = $queryBuscaMaterias->fetch_assoc()){
                                            echo '<option value="'.$materias['id'].'">'.$materias['materia'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pergunta</label>
                                <textarea class="form-control" id="titulo" name="titulo" rows="4" required><?php echo $titulo;?></textarea>
                                <input type="hidden"value="<?php echo $id;?>" name="id">
                            </div>
                            <div class="form-group">
                                <label>Tempo</label>
                                <input type="number" class="form-control" id="tempo" name="tempo" min="30" value=<?php echo $tempo;?> required></input>
                                <input type="hidden"value="<?php echo $id;?>" name="id">
                            </div>
                            <div class="form-group">
                                <label>Imagem <?php if($imagem == 0){echo'(sem imagem)';}else{echo'(para alterar, apenas faça um novo upload)';} ?></label>
                                <input type="file" id="imagem" name="imagem">
                                <div id="img">
                                    <img src="uploads/<?php if($imagem != 0){ echo $imagem; }?>" id="preview" alt="">
                                </div>
                            </div>
                            <div class="form-group" style="display:none;">
                                <label>Questão</label>
                                <textarea class="form-control" id="questao" name="questao" rows="7" cols="400"><?php echo $questaot; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Respostas</label>
                                <div class="input-group has-error">
                                    <textarea class="form-control" id="errada1" name="errada1" rows="4" required><?php echo $errada1; ?></textarea>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-remove-circle"></i></span>
                                </div><br>
                                <div class="input-group has-error">
                                    <textarea class="form-control" id="errada2" name="errada2" rows="4" required><?php echo $errada2; ?></textarea>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-remove-circle"></i></span>
                                </div><br>
                                <div class="input-group has-error">
                                    <textarea class="form-control" id="errada3" name="errada3" rows="4" required><?php echo $errada3; ?></textarea>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-remove-circle"></i></span>
                                </div><br>
                                <div class="input-group has-success">
                                    <textarea class="form-control" id="correta" name="correta" rows="4" required><?php echo $correta; ?></textarea>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok-circle"></i></span>
                                </div>
                            </div>
                        </fieldset>
                        <div>
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fa fa-save"></i>
                                Alterar
                            </button>
                        </div>
                    </form>
  				</div>
  			</div>
          </div>
		</div>
    </div>

    <?php include './includes/rodape.php' ?>
    <script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"> </script>
    <script src="js/editors.js"> </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery.min.js"> </script>
    <script src="js/bootstrap-select.min.js"> </script>
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
    </script>
  </body>
</html>