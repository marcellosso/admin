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
            <div class="col-md-4 offset-md-3">


                <div class="content-box-large">
                    <div class="panel-heading">
                        <button class="btn-back btn" onclick="window.history.back();">
                            <i class="fa fa-arrow-left"></i>
                        </button>
                        <div class="panel-title">Alterar Situação do Pedido</div>
                    </div>
                    <div class="panel-body">
                        <fieldset>
                            <filedset>
                                <legend>Dados Pedido</legend>
                                <div class="form-group">
                                    <label>Pedido</label>
                                    <input class="form-control" id="input-id-pedido" type="text" value="" readonly/>
                                    <input type="hidden" id="input-id" value="<?php echo $_GET['id'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Categoria</label>
                                    <input class="form-control" id="input-categoria" type="text" value="" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Produto</label>
                                    <input class="form-control" id="input-produto" type="text" value="" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Nome do Pai</label>
                                    <input class="form-control" id="input-nome-pai" type="text" value="" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Nome do Filho</label>
                                    <input class="form-control" id="input-nome-filho" type="text" value="" readonly/>
                                </div>


                                <div class="form-group">
                                    <label>Data</label>
                                    <input class="form-control" id="input-data" type="text" value="" readonly/>
                                </div>
                            </filedset>

                            <filedset>
                                <legend>Dados Envio</legend>
                                <div class="form-group">
                                    <label>Cep</label>
                                    <input class="form-control" id="input-cep" type="text" value="" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Logradouro</label>
                                    <input class="form-control" id="input-logradouro" type="text" value="" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Numero</label>
                                    <input class="form-control" id="input-numero" type="text" value="" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input class="form-control" id="input-bairro" type="text" value="" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input class="form-control" id="input-cidade" type="text" value="" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Serviço de Envio</label>
                                    <input class="form-control" id="input-frete" type="text" value="" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Valor</label>
                                    <input class="form-control" id="input-frete-valor" type="text" value="" readonly/>
                                </div>
                            </filedset>


                            <filedset>
                                <legend>Dados Pagamento</legend>

                                <div class="form-group">
                                    <label>Documento informado</label>
                                    <input class="form-control" id="input-pagamento-doc" type="text" value="" readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Número do documento</label>
                                    <input class="form-control" id="input-pagamento-doc-numero" type="text" value=""
                                           readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Bandeira Cartão de Crédito</label>
                                    <input class="form-control" id="input-pagamento-brand" type="text" value=""
                                           readonly/>
                                </div>

                                <div class="form-group">
                                    <label>4 últimos dígitos do cartão</label>
                                    <input class="form-control" id="input-pagamento-cc-numero" type="text" value=""
                                           readonly/>
                                </div>

                                <div class="form-group">
                                    <label>Token</label>
                                    <input class="form-control" id="input-pagamento-cc-token" type="text" value=""
                                           readonly/>
                                </div>
                            </filedset>

                            <filedset>
                                <legend>Status</legend>
                                <div class="form-group">
                                    <label>Status Pedido</label>
                                    <select id='ckp-status-pedido' class="form-control">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Pagamento</label>
                                    <select id='ckp-status-pagamento' class="form-control">
                                    </select>
                                </div>
                            </filedset>


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
        $(function () {
            let id = $('#input-id').val();
            let status_pedido = JSON.parse('<?php echo json_encode($status_pedido); ?>');
            let status_pagamento = JSON.parse('<?php echo json_encode($status_pagamento); ?>');
            let status_pagamento_pedido = JSON.parse('<?php echo json_encode($status_pagamento_pedido); ?>');
            $.ajax({
                type: 'GET',
                url: '<?php echo URL_API_FUTURONERD;?>/pedido/' + id + '',
                dataType: 'json',
                success: function (req) {
                    $('#input-id-pedido').val(req.pp_id);
                    $('#input-produto').val(req.p_nome_produto);
                    $('#input-nome-filho').val(req.cf_nome);
                    $('#input-nome-pai').val(req.cp2_nome);
                    $('#input-data').val(req.pp_data_pedido);
                    $('#input-categoria').val(req.cp_categoria);

                    $('#input-cep').val(req.pagamento_shipping_postalcode);
                    $('#input-logradouro').val(req.pagamento_shipping_street);
                    $('#input-bairro').val(req.pagamento_shipping_district);
                    $('#input-cidade').val(req.pagamento_shipping_city);
                    $('#input-numero').val(req.pagamento_shipping_number);
                    $('#input-frete').val(req.frete_nome);
                    $('#input-frete-valor').val(req.frete_preco);

                    $('#input-pagamento-doc').val(req.pagamento_sender_document_type);
                    $('#input-pagamento-doc-numero').val(req.pagamento_sender_document_value);
                    $('#input-pagamento-brand').val(req.creditcard_brand);
                    $('#input-pagamento-cc-numero').val(req.creditcard_numero_cartao.substr(req.creditcard_numero_cartao.length - 4, 4));
                    $('#input-pagamento-cc-token').val(req.creditcard_token);


                    jQuery.each(status_pedido, function (key, value) {
                        let option = (key == req.pp_status_pedido) ? {
                            'value': key,
                            'text': value,
                            'selected': 'selected'
                        } : {'value': key, 'text': value};
                        $('<option/>', option).appendTo('#ckp-status-pedido');
                    });

                    jQuery.each(status_pagamento, function (key, value) {
                        let option = (key == req.ppp_status_pagamento) ? {
                            'value': key,
                            'text': value,
                            'selected': 'selected'
                        } : {'value': key, 'text': value};
                        $('<option/>', option).appendTo('#ckp-status-pagamento');
                    });


                }
            });
        })

        $('#btn').click(function () {
            let id = $('#input-id').val();
            let id_status_pedido = $('#ckp-status-pedido').val();
            let id_status_pagamento = $('#ckp-status-pagamento').val();

            $.ajax({
                url: '<?php echo URL_API_FUTURONERD;?>/pedido/status/' + id + '',
                dataType: 'json',
                type: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify({"status_pedido": id_status_pedido, "status_pagamento": id_status_pagamento}),
                processData: false,
                success: function (res) {
                    $("#btn").notify("Pedido " + id + " editado com sucesso!", "success");
                },
                error: function (erro) {
                    $("#btn").notify("Pedido não editado, tente novamente mais tarde. {" + erro.statusText + "}", "error");
                    console.log(erro);
                }
            });

        });
    </script>

    </body>
</html>