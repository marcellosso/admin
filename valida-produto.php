<?php

if(isset($_POST['nome'])){
    
    require('db.php');

    $categoria = $mysqli->real_escape_string($_POST['categoria']);
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $preco = $mysqli->real_escape_string($_POST['preco']);
    $descricao = $mysqli->real_escape_string($_POST['descricao']);

    $largura = $mysqli->real_escape_string($_POST['largura']);
    $altura = $mysqli->real_escape_string($_POST['altura']);
    $comprimento = $mysqli->real_escape_string($_POST['comprimento']);
    $peso = $mysqli->real_escape_string($_POST['peso']);


    $uploaddir = 'uploads/';

    $extensao = pathinfo($_FILES['imagem']['name']);
    $extensao = ".".$extensao['extension'];
    $arq = $mysqli->real_escape_string(time().$extensao);

    $uploadfile = $uploaddir . basename($arq);

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile)) {
        $arquivo = $arq;
    } else { $arquivo = 0; }

    $sql = 'INSERT INTO produtos (
        nome_produto,
        preco,
        foto, 
        descricao, 
        id_categoria, largura, altura, comprimento, peso) VALUES (
        "'.$nome.'",
        "'.$preco.'",
        "'.$arquivo.'",
        "'.$descricao.'",
        "'.$categoria.'",
        "'.$largura.'",
        "'.$altura.'",
        "'.$comprimento.'",
        "'.$peso.'"
    )';
    $query = $mysqli->query($sql);
    if($query){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Produto incluido com sucesso');
        window.location.href='loja.php';
        </script>");
    } else {
        //echo $sql;
        echo 'erro interno';
    }

} else {
    echo 'erro interno';
}

?>