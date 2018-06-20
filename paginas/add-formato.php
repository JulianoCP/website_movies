<?php include("cabe.php");
include '../conexao.php';?>

<main>
  <div id="main">
    <div class="container" style="margin-top:250px">
      <div class="add row justify-content-center">
        <form class="form-inline" class="borda" action="addformato.php" method="get">
          <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Formato...">
          </div>
          <button type="submit" class="btn btn-outline-light mb-2">ADICIONAR</button>
        </form>
      </div>
    </div>
  </div>
  <?php include("rodape.php") ?>
