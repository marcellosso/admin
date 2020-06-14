<?php

if(isset($_POST['titulo'])){
    
    require('db.php');

    $id = $_POST['id'];
    $serie = $mysqli->real_escape_string($_POST['serie']);
    $materia = $mysqli->real_escape_string($_POST['materia']);
    $titulo = $mysqli->real_escape_string($_POST['titulo']);
    $questao = $mysqli->real_escape_string($_POST['questao']);
    $respostaErrada1 = $mysqli->real_escape_string($_POST['errada1']);
    $respostaErrada2 = $mysqli->real_escape_string($_POST['errada2']);
    $respostaErrada3 = $mysqli->real_escape_string($_POST['errada3']);
    $respostaCorreta = $mysqli->real_escape_string($_POST['correta']);

    if(!empty($_FILES['imagem']['tmp_name'])){
        $uploaddir = 'uploads/';

        $extensao = pathinfo($_FILES['imagem']['name']);
        $extensao = ".".$extensao['extension'];
        $arq = $mysqli->real_escape_string(time().$extensao);
    
        $uploadfile = $uploaddir . basename($arq);
    
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile)) {
            $arquivo = $arq;

            $sql = 'UPDATE questoes SET titulo="'.$titulo.'",
            questao="'.$questao.'",
            imagem="'.$arquivo.'",
            id_serie="'.$serie.'",
            id_materia="'.$materia.'",
            resposta_errada="'.$respostaErrada1.'",
            resposta_errada1="'.$respostaErrada2.'",
            resposta_errada2="'.$respostaErrada3.'",
            resposta_correta="'.$respostaCorreta.'"
            WHERE id = "'.$id.'"';
        }

    } else {
        $sql = 'UPDATE questoes SET titulo="'.$titulo.'",
        questao="'.$questao.'",
        id_serie="'.$serie.'",
        id_materia="'.$materia.'",
        resposta_errada="'.$respostaErrada1.'",
        resposta_errada1="'.$respostaErrada2.'",
        resposta_errada2="'.$respostaErrada3.'",
        resposta_correta="'.$respostaCorreta.'"
        WHERE id = "'.$id.'"';
    }

    $query = $mysqli->query($sql);
    if($query){
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Questão atualizada com sucesso');
            window.location.href='questoes.php';
            </script>");
    } else {
        //echo $sql;
        echo 'erro interno';
    }

} else {
    echo 'erro interno';
}

?>