<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">


    <title>Document</title>
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="../index.php">Sistema de Controle de Maquinas</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false"
                    aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                    <ul class="navbar-nav ml-auto mr-md-3">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Home <span class="sr-only">(página atual)</span></a>
                        </li>
                        <li class="nav-item">
                            <!--  <a class="nav-link" href="#">Link</a> -->
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Maquinas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../index.php">Pendentes</a>
                                <a class="dropdown-item" href="../sistem/transferencia.php">Transferencia</a>
                                <a class="dropdown-item" href="../sistem/entregues.php">Entregues</a>
                                <a class="dropdown-item" href="../sistem/maquinas_livres.php">Livres</a>
                                <a class="dropdown-item" href="#"></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item disabled" href="#">Em Breve</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['UsuarioNome'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../users/index.php">Informação</a>
                                <a class="dropdown-item" href="../users/trocarsenha.php">Trocar Senha</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php">Logout</a>
                                <?php
	  if ($_SESSION['UsuarioNivel'] == '5' || $_SESSION['UsuarioID'] == '7') {
          ?>
                                <a href="../private/config.php" class="dropdown-item">Configurações gerais</a>
                                <?php
          }
          ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <!--  <a class="nav-link disabled" href="#">Desativado</a> -->
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <br>

    <div class="container34">
        <iframe
            src="https://calendar.google.com/calendar/embed?height=700&wkst=1&bgcolor=%23A79B8E&ctz=America%2FSao_Paulo&title=CALENDARIO%20DE%20REVEZAMENTO&showDate=1&showNav=1&showTabs=1&showCalendars=0&showTz=0&src=c3Vwb3J0ZS5jaWFncm9AZ21haWwuY29t&src=ZW4uYnJhemlsaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%230B8043"
            style="border-width:0" width="900" height="700" frameborder="0" scrolling="no"></iframe>
    </div>
</body>

</html>