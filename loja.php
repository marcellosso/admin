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

			<div class="col-md-5">
				<div class="content-box-large">
					<div class="panel-heading">
						<div class="panel-title">Produtos</div>
						<div class="full-right">
							<a href="incluir-produto.php">
								<button class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Incluir Novo Produto</button>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabela-produtos">
							<thead>
								<tr>
									<th style="min-width:20px;">Id</th>
									<th>Produto</th>
									<th style="min-width:50px;">Opções</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-5">
				<div class="content-box-large">
					<div class="panel-heading">
						<div class="panel-title">Categoria de Produtos</div>
						<div class="full-right">
							<a href="incluir-categoria-prod.php">
								<button class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Incluir Nova Categoria</button>
							</a>
						</div>
					</div>
					<div class="panel-body">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tabela-categoria-prod">
							<thead>
								<tr>
									<th style="min-width:20px;">Id</th>
									<th>Categoria</th>
									<th style="min-width:50px;">Opcões</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
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
		$('#tabela-categoria-prod').dataTable({
			"language": {
				"url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
			},
			"ajax": "<?php echo URL_API_FUTURONERD;?>/categoria-prod/datatable",
			"columns": [
				{"data":"id","class":"text-center"},
				{"data":"categoria"},
				{"data":"id","class":"text-center"}
			],
			"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
				var id = aData["id"];
				var btns = '<a href="alterar-categoria-prod.php?id='+ id +'"><button class="btn btn-xs btn-info" title="Alterar"><i class="fa fa-edit"></i></button></a> <a onclick="excluirCat('+id+');"><button class="btn btn-xs btn-danger" title="Excluir"><i class="fa fa-times"></i></button></a>';
				$('td:eq(2)', nRow).html(btns);
			}
		});
		$('#tabela-produtos').dataTable({
			"language": {
				"url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
			},
			"ajax": "<?php echo URL_API_FUTURONERD;?>/produtos/datatable",
			"columns": [
				{"data":"id","class":"text-center"},
				{"data":"nome_produto"},
				{"data":"id","class":"text-center"}
			],
			"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
				var id = aData["id"];
				var btns = '<a href="alterar-produto.php?id='+ id +'"><button class="btn btn-xs btn-info" title="Alterar"><i class="fa fa-edit"></i></button></a> <a onclick="excluirProd('+id+');"><button class="btn btn-xs btn-danger" title="Excluir"><i class="fa fa-times"></i></button></a>';
				$('td:eq(2)', nRow).html(btns);
			}
		});
	});

	function excluirCat(id){
        var e = confirm("Tem certeza que deseja excluir essa categoria de id: "+id+"?");
        if (e == true) {
          $.ajax({
            url: '<?php echo URL_API_FUTURONERD;?>/categoria-prod/'+id+'',
            dataType: 'json',
            type: 'delete',
            contentType: 'application/json',
            processData: false,
            success: function(res){
                alert('Categoria de produtos de id: '+id+' excluida');
                $('#tabela-categoria-prod').DataTable().ajax.reload();
            },
            error: function(erro){
                alert("Categoria não excluida, tente novamente mais tarde. {"+erro.statusText+"}");
            }
        });
        }
      }

	  function excluirProd(id){
        var e = confirm("Tem certeza que deseja excluir esse produto de id: "+id+"?");
        if (e == true) {
          $.ajax({
            url: '<?php echo URL_API_FUTURONERD;?>/produtos/'+id+'',
            dataType: 'json',
            type: 'delete',
            contentType: 'application/json',
            processData: false,
            success: function(res){
                alert('Produto de id: '+id+' excluido');
                $('#tabela-produtos').DataTable().ajax.reload();
            },
            error: function(erro){
                alert("Categoria não excluida, tente novamente mais tarde. {"+erro.statusText+"}");
            }
        });
        }
      }
	</script>
	</body>

</html>