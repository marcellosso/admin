<?php 

if(isset($_POST['email'])){
    require('db.php');

    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql = 'SELECT * FROM usuarios_ad WHERE email = ? and senha = ?';
    $query = $mysqli->prepare($sql);
    $query->bind_param('ss',$email,$senha);
    $query->execute();
    $query->store_result();
    $l = $query->num_rows;
    $query->close();
    if($l != 0) {
        session_start();
        $_SESSION['email'] = $email;
        header('location: index.php');
    } else {
        echo'<script>alert("Usuário não Autenticado!");window.history.back();</script>';
    }
}

?>