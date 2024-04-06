<?php
// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
    header("Location: index.php"); exit;
}

$servidor_bd = "192.168.0.110:3306";
$usuario_bd = "SistemMaquina";
$senha_bd = "hoome2024";
$banco_bd = "Controle_de_Sistema";

$conn = mysqli_connect($servidor_bd, $usuario_bd, $senha_bd, $banco_bd) or trigger_error(mysql_error());

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT id, nome, nivel 
        FROM usuarios
        WHERE (usuario = '". $usuario ."') 
        AND (senha = SHA1('". $senha ."')) 
        AND (ativo = 1) 
        LIMIT 1";

$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) != 1){
    //Mensagem de erro quando os dados sao invalidos e/ou o usuario nao foi encontrado
    echo "Login Invalido!"; exit;
}else{
    // Salva os dados encontados na variável $resultado
    $resultado = mysqli_fetch_assoc($query);
    // Se a sessão não existir, inicia uma
      if (!isset($_SESSION)) session_start();

      // // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNome'] = $resultado['nome'];
      $_SESSION['UsuarioNivel'] = $resultado['nivel'];

      // Redireciona o visitante
      header("Location: sistem/index.php"); exit;
}
?>