<?php

// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
    header("Location: index.php"); exit;
}




$servidor_bd = "192.168.0.110:3306";
$usuario_bd = "SistemMaquina";
$senha_bd = "hoome2024";
$banco_bd = "Controle_de_Sistema";

$conn = mysqli_connect($servidor_bd, $usuario_bd, $senha_bd, $banco_bd);





echo "<h1>Redirecionamento OK .2</h1>";





?>