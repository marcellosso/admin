<?php

//$servidor = "localhost";
$servidor = "ffn96u87j5ogvehy.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";

// $usuario = "futurone_admin";
// $senha = "N]K}mqzobm-*";
// $banco = "futurone_db";

// $usuario = "futuronerd";
// $senha = "futuronerd";
// $banco = "futuronerd";

// DB Local
// $usuario = "root";
// $senha = "root123";
// $banco = "futuro_nerd_local";

// DB On
$usuario = "uvmrvwcmw19kt2su";
$senha = "zawuvgqtjcs5t9ff";
$banco = "p040hst38t6dnx4w";

// $usuario = "root";
// $senha = "";
// $banco = "ga2_futuronerd";

$mysqli = new mysqli($servidor, $usuario, $senha, $banco);
$mysqli->set_charset("utf8");
if(mysqli_connect_errno()) trigger_error(mysqli_conect_error());

?>