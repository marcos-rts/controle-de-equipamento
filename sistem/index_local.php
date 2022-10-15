<?php

// require 'banco.php';
//Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
//Acessando valores dentro de uma sessão:
//echo $_SESSION['UsuarioID'];
//echo $_SESSION['UsuarioNome'];


$local = null;
if (!empty($_GET['local'])) {
    $local = $_REQUEST['local'];
}

if (null == $local) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_list_index.css">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <title>🟢Home</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
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
                                <a class="dropdown-item" href="../sistem/index.php">Pendentes</a>
                                <!-- <a class="dropdown-item" href="../sistem/transferencia.php">Transferencia</a> -->
                                <a class="dropdown-item" href="../sistem/entregues.php">Entregues</a>
                                <a class="dropdown-item" href="../sistem/maquinas_livres.php">Livres</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item disabled" href="#">Em Breve</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../php/calendario.php">Calendario</a>
                        </li>
                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['UsuarioNome'] ?>
                            </a> -->
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                usuario

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../users/index.php">Informação</a>
                                <a class="dropdown-item" href="../users/trocarsenha.php">Trocar Senha</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php">Logout</a>
                            </div>
                        </li>

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Outros
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../php/calendario.php">Calendario</a>
                                <a class="dropdown-item" href="../sistem/transferencia.php">Transferencia</a>
                                <a class="dropdown-item" href="../sistem/entregues.php">Entregues</a>
                                <a class="dropdown-item" href="../sistem/maquinas_livres.php">Livres</a>
                                <a class="dropdown-item" href="#"></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item disabled" href="#">Em Breve</a>
                            </div>
                        </li> -->
                        <li class="nav-item">
                            <?php
	                            if ($_SESSION['UsuarioNivel'] == '5') {
                                ?>
                            <a href="../private/config.php" class="nav-link">Admin</a>
                            <?php
                                }
                                ?>
                        </li>
                    </ul>
                </div>
            </nav>
            <small>🟢Conectado como <strong><?php echo $_SESSION['UsuarioNome'] ?> </strong></small>

        </div>

    </header>

    <!-- END nav -->
    <div class="container">
        </br>
        <!-- config de nivel 1 -->
        <?php
        if ($_SESSION['UsuarioNivel'] == '1') {
        ?>
        <div class="row">
            <p>
                <!-- <a href="create.php" class="btn btn-success">Adicionar</a> -->
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Adicionar
                </button>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="create/create_desktop.php">Desktop</a>
                    <a class="dropdown-item" href="create/create_notebook.php">Notebook</a>
                    <a class="dropdown-item" href="create/create_impressora.php">Impressora</a>
                    <a class="dropdown-item" href="create/create.php">Outros</a>
                </div>
            </div>

            </p>
            <br>
            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Local</th>
                            <th scope="col">Entrada</th>
                            <th scope="col">Status</th>
                            <th scope="col">Chapa</th>
                            <th scope="col">Armazenamento</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM maquina ORDER BY id DESC';

                        foreach ($pdo->query($sql) as $row) {
                            if ($row['status'] != 'Entregue') {
                                if ($row['status'] != 'CTI' ) {
			                        if ($row['status'] != 'Transferencia'){
			                            if ($row['status'] != 'Arquivado'){
                                            echo '<tr scope="row">';
                                            echo '<th>' . $row['id'] . '</th>';
                                            echo '<td><a href="#">' . $row['local'] . '</a><small class="d-block">' . $row['setor'] . '</small></td>';
                                            echo '<td width=150>' . $row['entrada'] . '</td>';
				                            echo '<td>' . $row['status'] . '</td>';
                                            echo '<td>' . $row['chapa'] . '</td>';
                                            echo '<td>' . $row['local2'] . '</td>';
                                            echo '<td width=200>';
                                            echo '<a href="read.php?id=' . $row['id'] . '"><strong>👁️</strong></a>';
                                            echo ' ';
                                            echo '<a href="imprimir.php?id=' . $row['id'] . '">🖨️</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                            echo '<tr class="spacer"><td colspan="100"></td></tr>';
                                        }
			                        }
			                    }
			                }
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- fim config de nivel 1 -->

        <!-- config de nivel 2, 3 e 4-->
        <?php
        if ($_SESSION['UsuarioNivel'] == '2' || $_SESSION['UsuarioNivel'] == '3' || $_SESSION['UsuarioNivel'] == '4') {
        ?>
        <div class="row">
            <p>
                <!-- <a href="create.php" class="btn btn-success">Adicionar</a> -->
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Adicionar
                </button>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="create/create_desktop.php">Desktop</a>
                    <a class="dropdown-item" href="create/create_notebook.php">Notebook</a>
                    <a class="dropdown-item" href="create/create_impressora.php">Impressora</a>
                    <a class="dropdown-item" href="create/create.php">Outros</a>
                </div>
            </div>

            </p>
            <br>
            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Local</th>
                            <th scope="col">Entrada</th>
                            <th scope="col">Status</th>
                            <th scope="col">Chapa</th>
                            <th scope="col">Armazenamento</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM maquina ORDER BY id DESC';

                        foreach ($pdo->query($sql) as $row) {
                            if ($row['status'] != 'Entregue') {
                                if ($row['status'] != 'CTI' ) {
			                        if ($row['status'] != 'Transferencia'){
			                            if ($row['status'] != 'Arquivado'){
                                            if ($row['local'] == $local){
                                            echo '<tr scope="row">';
                                            echo '<th>' . $row['id'] . '</th>';
                                            echo '<td><a href="index_local.php?local=' . $row['local'] . '">' . $row['local'] . '</a><small class="d-block">' . $row['setor'] . '</small></td>';
                                            echo '<td width=150>' . $row['entrada'] . '</td>';
				                            echo '<td>' . $row['status'] . '</td>';
                                            echo '<td>' . $row['chapa'] . '</td>';
                                            echo '<td>' . $row['local2'] . '</td>';
                                            echo '<td width=200>';
                                            echo '<a href="read.php?id=' . $row['id'] . '"><strong>👁️</strong></a>';
                                            echo ' ';
                                            echo '<a href="update.php?id=' . $row['id'] . '">✏️</a>';
                                            echo ' ';
                                            echo '<a href="imprimir.php?id=' . $row['id'] . '">🖨️</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                            echo '<tr class="spacer"><td colspan="100"></td></tr>';
                                        }
                                    }
			                        }
			                    }
			                }
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- fim config de nivel 2, 3 e 4-->

        <!-- config de nivel 5-->
        <?php
        if ($_SESSION['UsuarioNivel'] == '5') {
        ?>
        <div class="row">
            <p>
                <!-- <a href="create.php" class="btn btn-success">Adicionar</a> -->
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Adicionar
                </button>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="create/create_desktop.php">Desktop</a>
                    <a class="dropdown-item" href="create/create_notebook.php">Notebook</a>
                    <a class="dropdown-item" href="create/create_impressora.php">Impressora</a>
                    <a class="dropdown-item" href="create/create.php">Outros</a>
                </div>
            </div>

            </p>
            <br>
            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Local</th>
                            <th scope="col">Entrada</th>
                            <th scope="col">Status</th>
                            <th scope="col">Chapa</th>
                            <th scope="col">Armazenamento</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM maquina ORDER BY id DESC';

                        foreach ($pdo->query($sql) as $row) {
                            if ($row['status'] != 'Entregue') {
                                if ($row['status'] != 'CTI' ) {
			                        if ($row['status'] != 'Transferencia'){
			                            if ($row['status'] != 'Arquivado'){
                                            echo '<tr scope="row">';
                                            echo '<th>' . $row['id'] . '</th>';
                                            echo '<td><a href="#">' . $row['local'] . '</a><small class="d-block">' . $row['setor'] . '</small></td>';
                                            echo '<td width=150>' . $row['entrada'] . '</td>';
				                            echo '<td>' . $row['status'] . '</td>';
                                            echo '<td>' . $row['chapa'] . '</td>';
                                            echo '<td>' . $row['local2'] . '</td>';
                                            echo '<td width=200>';
                                            echo '<a href="read.php?id=' . $row['id'] . '"><strong>👁️</strong></a>';
                                            echo ' ';
                                            echo '<a href="update.php?id=' . $row['id'] . '">✏️</a>';
                                            echo ' ';
                                            echo '<a href="imprimir.php?id=' . $row['id'] . '">🖨️</a>';
                                            echo ' ';
                                            echo '<a href="delete.php?id=' . $row['id'] . '">❌</a>';            
                                            echo '</td>';
                                            echo '</tr>';
                                            echo '<tr class="spacer"><td colspan="100"></td></tr>';
                                        }
			                        }
			                    }
			                }
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- fim config de nivel 5-->



        <hr>

    </div>

    <footer>
        <div class="container">
            <span class="badge badge-secondary">v 2.0 &copy; 2021 - Marcos A. R. T. dos Santos</span>



        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
    function AdicionarFiltro(tabela, coluna) {
        var cols = $("#" + tabela + " thead tr:first-child th").length;
        if ($("#" + tabela + " thead tr").length == 1) {
            var linhaFiltro = "<tr>";
            for (var i = 0; i < cols; i++) {
                linhaFiltro += "<th></th>";
            }
            linhaFiltro += "</tr>";

            $("#" + tabela + " thead").append(linhaFiltro);
        }

        var colFiltrar = $("#" + tabela + " thead tr:nth-child(2) th:nth-child(" + coluna + ")");

        $(colFiltrar).html("<select id='filtroColuna_" + coluna.toString() +
            "'  class='filtroColuna form-control'> </select>");

        var valores = new Array();

        $("#" + tabela + " tbody tr").each(function() {
            var txt = $(this).children("td:nth-child(" + coluna + ")").text();
            if (valores.indexOf(txt) < 0) {
                valores.push(txt);
            }
        });
        $("#filtroColuna_" + coluna.toString()).append("<option>Filtro</option>")
        for (elemento in valores) {
            $("#filtroColuna_" + coluna.toString()).append("<option>" + valores[elemento] + "</option>");
        }

        $("#filtroColuna_" + coluna.toString()).change(function() {
            var filtro = $(this).val();
            $("#" + tabela + " tbody tr").show();
            if (filtro != "Filtro") {
                $("#" + tabela + " tbody tr").each(function() {
                    var txt = $(this).children("td:nth-child(" + coluna + ")").text();
                    if (txt != filtro) {
                        $(this).hide();
                    }
                });
            }
        });

    };
    AdicionarFiltro("tab", 5);
    AdicionarFiltro("tab", 2);
    AdicionarFiltro("tab", 3);
    </script>

    <script>
    function AdicionarFiltro(tabela, coluna) {
        var cols = $("#" + tabela + " thead tr:first-child th").length;
        if ($("#" + tabela + " thead tr").length == 1) {
            var linhaFiltro = "<tr>";
            for (var i = 0; i < cols; i++) {
                linhaFiltro += "<th></th>";
            }
            linhaFiltro += "</tr>";

            $("#" + tabela + " thead").append(linhaFiltro);
        }

        var colFiltrar = $("#" + tabela + " thead tr:nth-child(2) th:nth-child(" + coluna + ")");

        $(colFiltrar).html("<select id='filtroColuna_" + coluna.toString() +
            "'  class='filtroColuna form-control'> </select>");

        var valores = new Array();

        $("#" + tabela + " tbody tr").each(function() {
            var txt = $(this).children("td:nth-child(" + coluna + ")").text();
            if (valores.indexOf(txt) < 0) {
                valores.push(txt);
            }
        });
        $("#filtroColuna_" + coluna.toString()).append("<option>Filtro</option>")
        for (elemento in valores) {
            $("#filtroColuna_" + coluna.toString()).append("<option>" + valores[elemento] + "</option>");
        }

        $("#filtroColuna_" + coluna.toString()).change(function() {
            var filtro = $(this).val();
            $("#" + tabela + " tbody tr").show();
            if (filtro != "Filtro") {
                $("#" + tabela + " tbody tr").each(function() {
                    var txt = $(this).children("td:nth-child(" + coluna + ")").text();
                    if (txt != filtro) {
                        $(this).hide();
                    }
                });
            }
        });

    };
    AdicionarFiltro("tab2", 2);
    AdicionarFiltro("tab2", 3);
    AdicionarFiltro("tab2", 5); <
    script src = "../js/jquery-3.3.1.min.js" >
    </script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    </script>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-0adf68fa-23ad-4b8d-81ce-a072aa689b8a"></div>

</body>

</html>