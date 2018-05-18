<?php include("paginas/cabecalho.php") ?>
<?php  include 'conexao.php';
$cat = "*";
?>
<main>
  <div id="main">
    <div class="container">
      <div class="row justify-content-center">
        <form action="index.php" class="Pesquisar" method="get">
          <div class="col-auto">
            <label class="sr-only sech" for="pesquisa">Pesquisar...</label>
            <div class="input-group mb-2">
              <input type="text" name="filme" class="form-control sech" id="pesquisa" aria-label="Pesquisar..."  placeholder="Pesquisar...">
              <div class="input-group-append lupa ">
                <button class="input-group-text searchButton" ><i class="fa fa-search"></i></button>
              </div>
            </div>

          </div>
        </form>
      </div>
      <div class='row'>
      <?php

      if(!empty($_GET['filme'])) {
        $query = preg_replace('/[^[:alnum:]_]/', '', $_GET['filme']);
        $sql = "select Nome, idFilmes, img from filmes where Nome LIKE '%" . $query . "%'";

      }
      else if(!empty($_GET['cat'])){
        $query = preg_replace('/[^[:alnum:]_]/', '', $_GET['cat']);
        $sql = "select Nome,idFilmes,img from filmes where categoria_idcategoria = " . $query ."";
      }
      else if(!empty($_GET['lancamento'])){
        $sql = "select Nome,idFilmes,img from filmes order by ano DESC";
      }
      else{
        $sql = "select Nome,idFilmes,img from filmes";
      }

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "
          <div class='filme col-lg-4 col-md-6 col-sm-12'>
            <div class='card'>
              <img class='card-img-top' height='35%' width='auto' src='./src/img/logo/". $row["img"] ."' alt='Card image cap'>
              <div class='card-body'>
                <h5 class='card-title text-center'>". $row["Nome"] ."</h5>
                <p class='card-text '></p>
              </div>
              <div class='card-footer text-center'>
                <form action='action/filme.php' method='get'>
                  <input name='id' type='hidden' value='".$row["idFilmes"]."' />
                  <small class='text-center'><button type='subi' class='btn btn-outline-danger' value=". $row["idFilmes"] .">INFORMAÇÕES</button></small>
                </form>
              </div>
            </div>
          </div>
      ";
        }
      } else {
        echo "0 results";
      }
      ?>
      </div>
    </div>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination btn-sm justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
</main>
<?php include("paginas/rodape.php") ?>
</html>
