<?php include("cabe.php") ?>
<?php  include '../conexao.php';?>
<main>
  <div id="main">
    <div class="container">
      <form class="borda" action="cadfilme.php" method="get">
        <div class="add form-row">
          <div class="form-group col-md-4">
            <label for="inputAddress"><span style="color:red;">Nome do Filme</span></label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome...">
          </div>
          <div class="form-group col-md-4">
            <label for="inputAddress"><span style="color:red;">Ano de Lançamento</span></label>
            <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano de Lançamento...">
          </div>
          <div class="form-group col-md-4">
            <label for="inputAddress"><span style="color:red;">Duração do Filme</span></label>
            <input type="text" class="form-control" id="duracao" name="duracao" placeholder="Duração...">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState"><span style="color:red;">Resolução do Filme</span></label>
            <select id="resolucao" class="genero form-control" name="resolucao">
              <?php
              $sql = "SELECT * FROM resolucao";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "
                  <option value=". $row["idresolucao"] .">". $row["Nome"] ."</option>
                  ";
                }
              } else {
                echo "0 results";
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState"><span style="color:red">Idioma do Filme</span></label>
            <select id="idioma" class="genero form-control" name="idioma">
              <?php
              $sql = "SELECT Nome,idIdioma FROM idioma";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "
                  <option value=". $row["idIdioma"] .">". $row["Nome"] ."</option>
                  ";
                }
              } else {
                echo "0 results";
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState"><span style="color:red;">Gênero</span></label>
            <select id="categoria" class="genero form-control" name="categoria">
              <?php
              $sql = "SELECT * FROM filmeshd.categoria";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "
                  <option value=". $row["idcategoria"] .">". $row["NomeCat"] ."</option>
                  ";
                }
              } else {
                echo "0 results";
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputAddress"><span style="color:red;">Diretor do Filme</span></label>
            <input type="text" class="form-control" id="diretor" name="diretor" placeholder="Diretor..."></input>
          </div>
          <div class="form-group col-md-4">
            <label for="inputAddress"><span style="color:red;">Ator Principal do Filme</span></label>
            <input type="text" class="form-control" id="ator" name="ator" placeholder="Ator principal..."></input>
          </div>
          <div class="form-group col-md-4">
            <label for="inputAddress"><span style="color:red;">Formato do Filme</span></label>

            <select id="formato" class="genero form-control" name="formato">
              <?php
              $sql = "SELECT * FROM filmeshd.formato";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "
                  <option value=". $row["idFormato"] .">". $row["Nome"] ."</option>
                  ";
                }
              } else {
                echo "0 results";
              }
              ?>
            </select>

          </div>
          <div class="form-group col-md-12">
            <label for="inputAddress"><span style="color:red;">Sinopse do Filme</span></label>
            <input type="text" class="form-control" id="sinopse" name="sinopse" placeholder="Sinopse..."></input>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <div class="form-group col-md-12">
              <input type="file" class="custom-file-input" name="img">
              <label class="custom-file-label" >Procurar imagem...</label>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <button type="submit" class="btn btn-outline-light">CADASTRAR</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php include("rodape.php") ?>
