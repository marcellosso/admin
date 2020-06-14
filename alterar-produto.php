<!DOCTYPE html>
<html>
  <head>
    <title>Futuro Nerd</title>
    <!-- jQuery UI -->
    <link href="css/jquery-ui.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <?php include './includes/topo.php' ?>
    <!-- fecha head com o include -->
    
    <?php 
    
        require('db.php');
        $id = $_GET['id'];

        $sql        = 'SELECT * FROM produtos WHERE id = "'.$id.'"';
        $query      = $mysqli->query($sql);
        $produto    = $query->fetch_assoc();
        
        $nome           = $produto['nome_produto'];
        $preco          = $produto['preco'];
        $imagem         = $produto['foto'];
        $descricao      = $produto['descricao'];
        $idCategoria    = $produto['id_categoria'];

        $largura        = $produto['largura'];
        $altura         = $produto['altura']; 
        $comprimento    = $produto['comprimento']; 
        $peso           = $produto['peso']; 

    ?>

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
					<div class="panel-title">Alterar Produto</div>
				</div>
  				<div class="panel-body">
                  <form action="valida-alterar-produto.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <label>Categoria</label><br>
                                <select name="categoria" id="slc-categoria" class="selectpicker form-control" data-live-search="true">
                                    <?php 
                                        $sqlBuscaSerieAtual = 'SELECT * FROM categoria_prod WHERE id = '.$idCategoria.'';
                                        $queryBuscaSerieAtual = $mysqli->query($sqlBuscaSerieAtual);
                                        $serieAtual = $queryBuscaSerieAtual->fetch_assoc();
                                        echo '<option value="'.$serieAtual['id'].'">'.$serieAtual['categoria'].'</option>';
                                        $sqlBuscaSeries = 'SELECT * FROM categoria_prod WHERE id NOT IN ('.$idCategoria.')';
                                        $queryBuscaSeries = $mysqli->query($sqlBuscaSeries);
                                        while($series = $queryBuscaSeries->fetch_assoc()){
                                            echo '<option value="'.$series['id'].'">'.$series['categoria'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label>Nome do produto</label>
                                <input class="form-control" type="text" name="nome" value="<?php echo $nome ?>">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label>Preço</label>
                                <input type="number" name="preco" class="form-control" value="<?php echo $preco ?>">
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                            <label>Imagem <?php if($imagem == 0){echo'(sem imagem)';}else{echo'(para alterar, apenas faça um novo upload)';} ?></label>
                                <input type="file" accept="image/*" name="imagem" id="imagem">
                                <div id="img">
                                    <img src="uploads/<?php if($imagem != 0){ echo $imagem; }?>" id="preview" alt="" class="" width="100%">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control" name="descricao"><?php echo $descricao ?></textarea>
                            </div>
                        </fieldset>
                        <fieldset>
                                <legend>Dados para cálculo do envio</legend>
                                <div class="form-group">
                                    <label>Largura</label>
                                    <input type="number" class="form-control" name="largura" value="<?php echo $largura ?>">
                                </div>
                                <div class="form-group">
                                    <label>Altura</label>
                                    <input type="number" class="form-control" name="altura" value="<?php echo $altura ?>">
                                </div>
                                <div class="form-group">
                                    <label>Comprimento</label>
                                    <input type="number" class="form-control" name="comprimento" value="<?php echo $comprimento ?>">
                                </div>
                                <div class="form-group">
                                    <label>Peso</label>
                                    <input type="float" class="form-control" name="peso" value="<?php echo $peso ?>">
                                </div>
                            </fieldset>
                        <div>
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fa fa-save"></i>
                                Salvar
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
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/jquery_3.3.1.min.js"></script>
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