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
            <div class="panel-title">Incluir Nova Matéria</div>
          </div>
          <div class="panel-body">
            <fieldset>
              <div class="form-group">
                <label>Matéria</label>
                <input class="form-control" name="materia" id="input-materia" type="text">
              </div>
            </fieldset>
            <div>
              <button id="btn" type="submit" class="btn btn-sm btn-success">
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
    $('#btn').click(function () {
      var materia = $('#input-materia').val();

      if (materia.trim() == "") {

        $("#input-materia").notify("Este campo não pode ficar vazio.", {
          position: "right"
        }, "error");
      } else {

        $.ajax({
          url: '<?php echo URL_API_FUTURONERD;?>/materia',
          dataType: 'json',
          type: 'post',
          contentType: 'application/json',
          data: JSON.stringify({
            "materia": materia
          }),
          processData: false,
          success: function (res) {
            $("#btn").notify("Matéria " + materia + " cadastrada com sucesso!", "success");
            $("#input-materia").val("");
          },
          error: function (erro) {
            $("#btn").notify("Matéria não cadastrada, tente novamente mais tarde. {" + erro.statusText + "}",
              "error");
            console.log(erro);
          }
        });
      }
    });
  </script>

  </body>

</html>