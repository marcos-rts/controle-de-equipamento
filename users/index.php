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
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Info Usuario</title>
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
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Lista de Usuarios</h2>
                </div>
            </div>
            <!-- Nivel 2 -->
            <?php
            if ($_SESSION['UsuarioNivel'] == '2') {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-responsive-xl">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                include 'banco.php';
                                $pdo = Banco::conectar();
                                $sql = 'SELECT * FROM usuarios';

                                foreach ($pdo->query($sql) as $row) {
                                    if ($row['nome'] == $_SESSION['UsuarioNome']) {
                                    ?>
                                <tr class="alert" role="alert">
                                    <td><?php echo $row['id'] ?></td>
                                    <td class="d-flex align-items-center">
                                        <div class="img" style="background-image: url(../images/vazio.png);"></div>
                                        <div class="pl-3 email">
                                            <span><?php echo $row['email'] ?></span>
                                            <span><?php echo $row['cadastro'] ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo $row['usuario'] ?></td>
                                    <?php
                                    if ($row['ativo'] == '1') { ?>
                                    <td class="status"><span class="active">Active</span></td>
                                    <?php
                                    }else{ ?>
                                    <td class="status"><span class="waiting">disabled</span></td>
                                    <?php
                                    }
                                    ?>
                                    <td>
                                        <a class="btn " href="read.php?id=<?php echo $row['id'] ?>">Info</a>
                                        <a class="btn " href="updatenivel1.php?id=<?php echo $row['id'] ?>">Atua.</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            <!-- Fim nivel 2 -->
            <!-- Nivel 5 -->
            <?php
            if ($_SESSION['UsuarioNivel'] == '5') {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-responsive-xl">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                include 'banco.php';
                                $pdo = Banco::conectar();
                                $sql = 'SELECT * FROM usuarios';

                                foreach ($pdo->query($sql) as $row) {
                                ?>
                                <tr class="alert" role="alert">
                                    <td><?php echo $row['id'] ?></td>
                                    <td class="d-flex align-items-center">
                                        <div class="img" style="background-image: url(../images/vazio.png);"></div>
                                        <div class="pl-3 email">
                                            <span><?php echo $row['email'] ?></span>
                                            <span><?php echo $row['cadastro'] ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo $row['usuario'] ?></td>
                                    <?php
                                    if ($row['ativo'] == '1') { ?>
                                    <td class="status"><span class="active">Active</span></td>
                                    <?php
                                    }else{ ?>
                                    <td class="status"><span class="waiting">disabled</span></td>
                                    <?php
                                    }
                                    ?>
                                    <td>
                                        <a class="btn " href="read.php?id=<?php echo $row['id'] ?>">Info</a>
                                        <a class="btn " href="update.php?id=<?php echo $row['id'] ?>">Atua.</a>
                                        <a class="btn " href="delete.php?id=<?php echo $row['id'] ?>">Del.</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a class="btn " href="niveis.php">Niveis de Usuarios</a>
            <?php
            }
            ?>
            <!-- Fim nivel 5 -->
        </div>
    </section>
    <footer>
        <div class="container">
            <span class="badge badge-secondary">v 3.0.0 &copy; 2021 - Marcos A. R. T. dos Santos</span>


        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>