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
            <div class="col-md-4 offset-md-3">


                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">Incluir Novo Produto</div>
                    </div>
                    <div class="panel-body">
                        <form action="valida-produto.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label>Categoria</label><br>
                                    <select name="categoria" id="slc-categoria" class="selectpsicker" data-live-search="true">

                                    </select>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label>Nome do produto</label>
                                    <input class="form-control" type="text" name="nome">
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label>Preço</label>
                                    <input type="number" class="form-control" name="preco">
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" id="imagem" accept="image/*" name="imagem">
                                    <div id="img">
                                        <img src="" id="preview" alt="" width="100%">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea class="form-control" name="descricao"></textarea>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Dados para cálculo do envio</legend>
                                <div class="form-group">
                                    <label>Largura</label>
                                    <input type="number" class="form-control" name="largura">
                                </div>
                                <div class="form-group">
                                    <label>Altura</label>
                                    <input type="number" class="form-control" name="altura">
                                </div>
                                <div class="form-group">
                                    <label>Comprimento</label>
                                    <input type="number" class="form-control" name="comprimento">
                                </div>
                                <div class="form-group">
                                    <label>Peso</label>
                                    <input type="float" class="form-control" name="peso">
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
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/jquery_3.3.1.min.js"></script>
    <script>
        $.getJSON("<?php echo URL_API_FUTURONERD;?>/categoria-prod", function (data) {
            $.each(data, function (i, item) {
                $('<option/>', {
                    value: item.id,
                    text: item.categoria
                }).appendTo('#slc-categoria');
            });
        });

        function previewIMG(input) {
            if (input.files && input.files[0]) {
                var leitor = new FileReader();

                leitor.onload = function (e) {
                    $("#preview").attr('src', e.target.result);

                    $("#preview").hide();
                    $("#preview").fadeIn(650);
                }
                leitor.readAsDataURL(input.files[0]);
            }
        }

        $("#imagem").change(function () {
            previewIMG(this);
        });
    </script>

    </body>

</html>