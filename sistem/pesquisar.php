<?php
    $servidor = "localhost";
    $usuario = "suporte";
    $senha = "sup0rt32022";
    $dbname = "novosistema";
    //Criar a conexao
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    $pesquisar = $_POST['pesquisar'];
    $result_pesquisa = "SELECT * FROM maquina WHERE local LIKE '%$pesquisar%' LIMIT 5";
    $resultado_pesquisas = mysqli_query($conn, $result_pesquisa);
    
    while($rows_maquinas = mysqli_fetch_array($resultado_pesquisas)){
        echo "Local da maquina: ".$rows_maquinas['local'].$rows_maquinas['id'].$rows_maquinas['status']."<br>";
    }
?>