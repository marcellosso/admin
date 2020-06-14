<?php

if(isset($_POST['nome'])){
    
    require('db.php');

    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = md5($mysqli->real_escape_string($_POST['senha']));

    $sql = 'INSERT INTO usuarios_ad (
        nome,
        email,
        senha) VALUES (
        "'.$nome.'",
        "'.$email.'",
        "'.$senha.'"    
        )
    ';
    $query = $mysqli->query($sql);
    if($query){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Usuário incluido com sucesso');
        window.location.href='index.php';
        </script>");
    } else {
        echo $sql;
        echo 'erro interno';
    }

} else {
    echo 'erro interno';
}

?>