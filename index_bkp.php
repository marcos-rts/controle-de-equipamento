<?php

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
    // Destrói a sessão por segurança
    session_destroy();
}else {
    header("Location: sistem/index.php");
}

?>
<!doctype html>
<html lang="pt-br">
    <head>
        <title>Suporte</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="img js-fullheight" style="background-image: url(img/wallpaper.jpg);">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Marcos Tecnologias</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <!-- <img src="img/logo_template_email.png"> -->
                            <h3 class="mb-4 text-center">Sistema de Controle de Maquinas</h3>
                            <form method="POST" action="validacao.php" class="signin-form">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        id="txUsuario"
                                        class="form-control"
                                        name="usuario"
                                        placeholder="Usuario"
                                        required
                                    >
                                </div>
                                <div class="form-group">
                                    <input
                                        id="password-field"
                                        id="senha"
                                        name="senha"
                                        type="password"
                                        class="form-control"
                                        placeholder="Senha"
                                        required
                                    >
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Login</button>
                                </div>
                                <!-- <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">
                                            Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#" style="color: #fff">Forgot Password</a>
                                    </div>
                                </div> -->
                            </form>
                            <!-- <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                            <div class="social d-flex text-center">
                                <a href="#" class="px-2 py-2 mr-md-1 rounded">
                                    <span class="ion-logo-facebook mr-2"></span> Facebook
                                </a>
                                <a href="#" class="px-2 py-2 ml-md-1 rounded">
                                    <span class="ion-logo-twitter mr-2"></span> Twitter
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
