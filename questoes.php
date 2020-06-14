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
		  <div class="col-md-10">


  			<div class="content-box-large">
  				<div class="panel-heading">
						<div class="panel-title">Questões</div>
						<div class="full-right">
								<a href="incluir-questao.php">
										<button class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Incluir Nova Questão</button>
								</a>
						</div>
					</div>
  				<div class="panel-body">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="series-tb">
            <thead>
              <tr>
                  <th style="min-width:20px;">Id</th>
                  <th>Série</th>
                  <th>Matéria</th>
                  <th>Perguntas</th>
                  <th style="min-width:50px;">Opções</th>
              </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>Id</th>
                      <th>Série</th>
                      <th>Matéria</th>
                      <th>Perguntas</th>
                      <th>Opções</th>
                  </tr>
              </tfoot>
					  </table>
  				</div>
  			</div>



		  </div>
		</div>
    </div>

    <?php include './includes/rodape.php' ?>

    <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <!-- jQuery UI -->
    <script src="js/jquery.ui.1.10.3.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script>
      $(document).ready(function() {
        $('#series-tb').dataTable({
          "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
          },
          "ajax": "<?php echo URL_API_FUTURONERD;?>/questoes/datatable",
          "columns": [
            {"data":"id","class":"text-center"},
            {"data":"serie"},
            {"data":"materia"},
            {"data":"titulo"},
            {"data":"id","class":"text-center"}
          ],
          "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            var id = aData["id"];
            var btns = '<a href="alterar-questao.php?id='+ id +'"><button class="btn btn-xs btn-info" title="Alterar"><i class="fa fa-edit"></i></button></a> <a onclick="excluir('+id+');"><button class="btn btn-xs btn-danger" title="Excluir"><i class="fa fa-times"></i></button></a>';
            $('td:eq(4)', nRow).html(btns);
          },
        // # - MXTera --
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                if(column.dataSrc() == 'materia' || column.dataSrc() == 'serie') {
                    var select = $('<select><option value="">'+$(column.footer()).html()+' - Todos</option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                }
            } );
        }
        // -- #
        });
      });

			function excluir(id){
        var e = confirm("Tem certeza que deseja excluir essa questão de id: "+id+"?");
        if (e == true) {
          $.ajax({
            url: '<?php echo URL_API_FUTURONERD;?>/questoes/'+id+'',
            dataType: 'json',
            type: 'delete',
            contentType: 'application/json',
            processData: false,
            success: function(res){
                alert('Questão de id: '+id+' excluida');
                $('#series-tb').DataTable().ajax.reload();
            },
            error: function(erro){
                alert("Questão não excluida, tente novamente mais tarde. {"+erro.statusText+"}");
            }
        });
        }
      }
		</script>

  </body>
</html>