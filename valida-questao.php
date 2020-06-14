<?php

if(isset($_POST['titulo'])){
    
    require('db.php');

    $serie = $mysqli->real_escape_string($_POST['serie']);
    $materia = $mysqli->real_escape_string($_POST['materia']);
    $titulo = $mysqli->real_escape_string($_POST['titulo']);
    $questao = $mysqli->real_escape_string($_POST['questao']);
    $respostaErrada1 = $mysqli->real_escape_string($_POST['errada1']);
    $respostaErrada2 = $mysqli->real_escape_string($_POST['errada2']);
    $respostaErrada3 = $mysqli->real_escape_string($_POST['errada3']);
    $respostaCorreta = $mysqli->real_escape_string($_POST['correta']);

    $uploaddir = 'uploads/';

    $extensao = pathinfo($_FILES['imagem']['name']);
    $extensao = ".".$extensao['extension'];
    $arq = $mysqli->real_escape_string(time().$extensao);

    $uploadfile = $uploaddir . basename($arq);

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadfile)) {
        $arquivo = $arq;
    } else { $arquivo = 0; }

    $sql = 'INSERT INTO questoes (titulo,
                                  questao,
                                  imagem, 
                                  id_serie, 
                                  id_materia, 
                                  resposta_errada, 
                                  resposta_errada1, 
                                  resposta_errada2,
                                  resposta_correta) VALUES (
                                  "'.$titulo.'",
                                  "'.$questao.'",
                                  "'.$arquivo.'",
                                  "'.$serie.'",
                                  "'.$materia.'",
                                  "'.$respostaErrada1.'",
                                  "'.$respostaErrada2.'",
                                  "'.$respostaErrada3.'",
                                  "'.$respostaCorreta.'"
                                  )';
    $query = $mysqli->query($sql);
    if($query){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Questão incluida com sucesso');
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