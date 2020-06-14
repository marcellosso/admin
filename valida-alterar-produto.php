<?php

if(isset($_POST['nome'])){
    
    require('db.php');

    $categoria = $mysqli->real_escape_string($_POST['categoria']);
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $preco = $mysqli->real_escape_string($_POST['preco']);
    $descricao = $mysqli->real_escape_string($_POST['descricao']);
    $id = $_POST['id'];

    $largura = $mysqli->real_escape_string($_POST['largura']);
    $altura = $mysqli->real_escape_string($_POST['altura']);
    $comprimento = $mysqli->real_escape_string($_POST['comprimento']);
    $peso = $mysqli->real_escape_string($_POST['peso']);

    if(!empty($_FILES['imagem']['tmp_name'])){

        $uploaddir = 'uploads/';

        $extensao = pathinfo($_FILES['imagem']['name']);
        $extensao = ".".$extensao['extension'];
        $arq = $mysqli->real_escape_string(time().$extensao);

        $uploadfile = $uploaddir . basename($arq);

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile)) {
            $arquivo = $arq;
        } else { $arquivo = 0; }

        $sql = ' UPDATE produtos SET 
            nome_produto="'.$nome.'",
            preco="'.$preco.'",
            foto="'.$arquivo.'",
            descricao="'.$descricao.'",
            id_categoria="'.$categoria.'",
            largura="'.$largura.'",
            altura="'.$altura.'",
            comprimento="'.$comprimento.'",
            peso="'.$peso.'"
            WHERE id = "'.$id.'"
        ';

    } else {
        $sql = ' UPDATE produtos SET 
            nome_produto="'.$nome.'",
            preco="'.$preco.'",
            descricao="'.$descricao.'",
            id_categoria="'.$categoria.'",
            largura="'.$largura.'",
            altura="'.$altura.'",
            comprimento="'.$comprimento.'",
            peso="'.number_format($peso, 2, '.', '').'"
            WHERE id = "'.$id.'"
        ';
    }
    $query = $mysqli->query($sql);
    if($query){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Produto alterado com sucesso');
        // window.history.back();
        // location.reload(); 
        window.location.href='loja.php';
        </script>");
    } else {
        // echo $sql;
        echo 'erro interno';
    }

} else {
    echo 'erro interno';
}

?>