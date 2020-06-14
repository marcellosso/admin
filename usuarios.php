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
					<div class="panel-title">Usuários do aplicativo</div>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="usuarios-tb">
						<thead>
							<tr>
								<th style="min-width:20px;">ID</th>
								<th>Nome</th>
								<th>E-mail</th>
								<th>Telefone</th>
								<th>CPF</th>
								<th>Plano</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
							    <th>ID</th>
								<th>Nome</th>
								<th>E-mail</th>
								<th>Telefone</th>
								<th>CPF</th>
								<th>Plano</th>
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
        $('#usuarios-tb').dataTable({
          "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
          },
          "ajax": "<?php echo URL_API_FUTURONERD;?>/pais/todos/datatable",
          "columns": [
            {"data":"id","className":"text-center"},
			{"data":"nome"},
			{"data":"email"},
			{"data":"celular"},
			{"data":"cpf"},
			{"data":"plano"}
          ],
        //   "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        //     var id = aData["id"];
        //     var btns = '<a href="alterar-serie.php?id='+ id +'"><button class="btn btn-info" title="Alterar"><i class="fa fa-edit"></i></button></a> <a onclick="excluir('+id+');"><button class="btn btn-danger" title="Excluir"><i class="fa fa-times"></i></button></a>';  
        //     $('td:eq(2)', nRow).html(btns);
        //   }
        });
      });

    //   function excluir(id){
    //     var e = confirm("Tem certeza que deseja excluir essa série de id: "+id+"?");
    //     if (e == true) {
    //       $.ajax({
    //         url: '<?php echo URL_API_FUTURONERD;?>/serie/'+id+'',
    //         dataType: 'json',
    //         type: 'delete',
    //         contentType: 'application/json',
    //         processData: false,
    //         success: function(res){
    //             alert('Serie de id: '+id+' excluida');
    //             $('#series-tb').DataTable().ajax.reload();
    //         },
    //         error: function(erro){
    //             alert("Série não excluida, tente novamente mais tarde. {"+erro.statusText+"}");
    //         }
    //     });
    //     }
    //   }
    </script>

  </body>
</html>