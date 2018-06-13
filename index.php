<?php include("paginas/cabecalho.php") ?>
<?php  include 'conexao.php';
$cat = "*";
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 8;
$offset = ($pageno-1) * $no_of_records_per_page;
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
        $sql = "SELECT * FROM filmes LIMIT $offset, $no_of_records_per_page";
      }

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "
          <div class='filme col-lg-3 col-md-6 col-sm-12'>
            <div class='card'>
              <img class='card-img-top' height='35%' width='auto' src='". $row["img"] ."' alt='Card image cap'>
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
  <?php

      $total_pages_sql = "SELECT COUNT(*) FROM filmes";
      $result = mysqli_query($conn,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);

      $sql = "SELECT * FROM filmes LIMIT $offset, $no_of_records_per_page";
      $res_data = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_array($res_data)){
          //here goes the data
      }
      mysqli_close($conn);
  ?>
  <ul class="pagination btn-sm justify-content-center">
      <li class="page-link "><a href="?pageno=1">Primeiro</a></li>
      <li class="page-link <?php if($pageno <= 1){ echo 'disabled'; } ?>">
          <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Anterior</a>
      </li>
      <li class="page-link <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
          <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Proximo</a>
      </li>
      <li class="page-link"><a href="?pageno=<?php echo $total_pages; ?>"> Ultimo</a></li>
  </ul>
</main>
<?php include("paginas/rodape.php") ?>
</html>
