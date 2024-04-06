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
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Destaques</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Preços</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Link dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Ação</a>
          <a class="dropdown-item" href="#">Outra ação</a>
          <a class="dropdown-item" href="#">Algo mais aqui</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</header>


<body>
    <main role="main">
    <div class="jumbotron">
  <h1 class="display-4">Olá, mundo!</h1>
  <p class="lead">Este é um simples componente jumbotron para chamar mais atenção a um determinado conteúdo ou informação.</p>
  <hr class="my-4">
  <p>Ele usa classes utilitárias para tipografia e espaçamento de conteúdo, dentro do maior container.</p>
  <a class="btn btn-secondary btn-lg" href="#" role="button">Leia mais</a>
</div>
<div class="container">

<div class="card-deck">
  <div class="card shadow p-3 mb-5 bg-white rounded">
    <!-- <img class="card-img-top" src=".../100px200/" alt="Imagem de capa do card"> -->
    <div class="card-body">
      <h5 class="card-title">Título do card</h5>
      <p class="card-text">Este é um card mais longo com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este conteúdo é um pouco maior.</p>
      <!-- <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p> -->
    </div>
  </div>
  <div class="card shadow p-3 mb-5 bg-white rounded">
    <!-- <img class="card-img-top" src=".../100px200/" alt="Imagem de capa do card"> -->
    <div class="card-body">
      <h5 class="card-title">Título do card</h5>
      <p class="card-text">Este é um card com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
      <!-- <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p> -->
    </div>
  </div>
  <div class="card shadow p-3 mb-5 bg-white rounded">
    <!-- <img class="card-img-top" src=".../100px200/" alt="Imagem de capa do card"> -->
    <div class="card-body ">
      <h5 class="card-title">Título do card</h5>
      <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este card tem o conteúdo ainda maior que o primeiro, para mostrar a altura igual, em ação.</p>
      <!-- <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p> -->
    </div>
  </div>
</div>
</main>
</div>
</body>
    <blockquote class="blockquote text-center">
        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum tempora nihil magnam id ullam soluta commodi. Numquam ipsum pariatur consectetur animi et recusandae maxime laudantium perferendis quisquam soluta. Molestias, minima!</p>
        <footer class="blockquote-foter">Teste</footer>
</blockquote>
</html>