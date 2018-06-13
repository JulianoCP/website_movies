<?php include("paginas/cabeadm.php");
include 'conexao.php';?>
<main>
  <div id="main">
    <div class="row justify-content-center">
      <form action="admin.php" class="Pesquisar" method="get">
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
    <div class="container col-md-8">
      <div class="row justify-content-center">
      </div>
      <div class="text-center col-md-12">
        <table class="table text-center table-sm table-bordered">
          <thead>
            <tr>
              <th scope="col" style="color:red">ID</th>
              <th scope="col" style="color:red">NOME</th>
              <th scope="col" style="color:red">EDITAR</th>
            </tr>
          </thead>
          <tbody>

            <?php

            if(!empty($_GET['filme'])) {
              $query = preg_replace('/[^[:alnum:]_]/', '', $_GET['filme']);
              $sql = "select Nome, idFilmes, img from filmes where Nome LIKE '%" . $query . "%'";

            }
            else{
              $sql = "select Nome,idFilmes,img from filmes";
            }

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {

              while($row = $result->fetch_assoc()) {
                echo "<tr>
                <th scope='row'>".$row["idFilmes"]."</th>
                <td>".$row["Nome"]."</td>
                <td class='text-center'>
                <button id='ver' type='submit' name='button' onclick='see(this.id, ".$row["idFilmes"].")'><i class='fas fa-eye'></i></button>
                <button id='edi' type='button' name='button' onclick='edi(this.id, ".$row["idFilmes"].")'><i class='fas fa-edit'></i></button>
                <button id='delete' type='submit' name='button' onclick='acao(this.id, ".$row["idFilmes"].")'><i class='fas fa-trash-alt'></i></button>
                </div></td>
                </tr>";

              }
            } else {
              echo "0 results";
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
  function acao(tipo, id) {
    if (tipo=='delete') {
      url="/action/delefilme.php?id=" + id;
      window.location.href = url;
    }
  }
  </script>
  <script>
  function see(tipo, id) {
    if (tipo=='ver') {
      url="/action/filme.php?id=" + id;
      window.location.href = url;
    }
  }
  </script>
  <script>
  function edi(tipo, id) {
    if (tipo=='edi') {
      url="/action/edifilme.php?id=" + id;
      window.location.href = url;
    }
  }
  </script>
  <?php include("paginas/rodape.php") ?>
