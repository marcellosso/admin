<?php require_once("config.php") ?>
<!DOCTYPE html>
<html>
<head>
    <title>Futuro Nerd</title>
    <!-- jQuery UI -->
    <link href="css/jquery-ui.css" rel="stylesheet" media="screen">

    <?php include './includes/topo.php' ?>
    <?php include './includes/pedido_aux_data.php' ?>
    <!-- fecha head com o include -->

    <div class="page-content">
        <div class="row">
            <div class="col-md-2">
                <?php include './includes/barra.php' ?>
            </div>
            <div class="col-md-10">


                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">Pedidos</div>
                        <!--              <div class="full-right">-->
                        <!--                  <a href="incluir-pedido.php">-->
                        <!--                      <button class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Incluir Novo pedido</button>-->
                        <!--                  </a>-->
                        <!--              </div>-->
                    </div>
                    <div class="panel-body">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
                               id="pedido-tb">
                            <thead>
                            <tr>
                                <th style="min-width:20px;">Id</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Pai</th>
                                <th>Filho</th>
                                <th>Data</th>
                                <th>Status Pedido</th>
                                <th>Status Pagamento</th>
                                <th style="min-width:50px;">Ação</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Pai</th>
                                <th>Filho</th>
                                <th>Data</th>
                                <th>Status Pedido</th>
                                <th>Status Pagamento</th>
                                <th>Ação</th>
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

        $(document).ready(function () {
            let status_pedido = JSON.parse('<?php echo json_encode($status_pedido); ?>');
            let status_pagamento = JSON.parse('<?php echo json_encode($status_pagamento); ?>');
            let status_pagamento_pedido = JSON.parse('<?php echo json_encode($status_pagamento_pedido); ?>');
            $('#pedido-tb').dataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
                },
                "ajax": "<?php echo URL_API_FUTURONERD;?>/pedido/datatable",
                "columns": [
                    {"data": "pp_id", "class": "text-center"},
                    {"data": "cp_categoria"},
                    {"data": "p_nome_produto"},
                    {"data": "cp2_nome"},
                    {"data": "cf_nome"},
                    {"data": "pp_data_pedido"},
                    {"data": "pp_status_pedido"},
                    {"data": "ppp_status_pagamento"},
                    {"data": "p_id", "class": "text-center"}
                ],
                "order": [[0, "desc"]],
                "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    var id = aData["pp_id"];
                    $('td:eq(6)', nRow).html(status_pedido[aData["pp_status_pedido"]]);
                    $('td:eq(7)', nRow).html(status_pagamento[aData["ppp_status_pagamento"]]);
                    var btns = '<a href="alterar-pedido.php?id=' + id + '"><button class="btn btn-xs btn-info" title="Alterar"><i class="fa fa-edit"></i></button></a> <a onclick="excluir(' + id + ');"><button class="btn btn-xs btn-danger" title="Excluir"><i class="fa fa-times"></i></button></a>';
                    $('td:eq(8)', nRow).html(btns);
                },
                // # - MXTera --
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        if(column.dataSrc() == 'cf_nome' || column.dataSrc() == 'cp2_nome') {
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

        function excluir(id) {
            var e = confirm("Tem certeza que deseja excluir essa pedido de id: " + id + "?");
            if (e == true) {
                $.ajax({
                    url: '<?php echo URL_API_FUTURONERD;?>/pedido/' + id + '',
                    dataType: 'json',
                    type: 'delete',
                    contentType: 'application/json',
                    processData: false,
                    success: function (res) {
                        alert('Pedido de id: ' + id + ' excluido');
                        $('#pedido-tb').DataTable().ajax.reload();
                    },
                    error: function (erro) {
                        alert("Pedido não excluido, tente novomente mais tarde. {" + erro.statusText + "}");
                    }
                });
            }
        }
    </script>

    </body>
</html>