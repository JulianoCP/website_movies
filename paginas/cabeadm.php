<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>FilmesHD</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
  <link rel="stylesheet" href="lib\bootstrap-4.0\css\bootstrap.css">
  <link rel="stylesheet" href="css\style.css">

</head>
<body class="d-flex flex-column">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top justify-content-between">
      <a class="navbar-brand" href="index.php" style="color:#e9ecef;"><div style="font-size:1em; color:#e9ecef">Filmes<span style="color: red "><b>HD</b></span>

      </div></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">

          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="dropdown">
              <button class="btn btn-outline-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ADICIONAR
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href='paginas/add-filme.php' class='dropdown-item' >Filme</a>
                    <a href='paginas/add-cate.php' class='dropdown-item' >Genero</a>
                    <a href='paginas/add-formato.php' class='dropdown-item' >Formato</a>
                    <a href='paginas/add-resolucao.php' class='dropdown-item' >Resolução</a>
                    <a href='paginas/add-idioma.php' class='dropdown-item' >Idioma</a>
              </div>
            </div>
          </div>
        </ul>
      </div>
    </nav>
  </header>
