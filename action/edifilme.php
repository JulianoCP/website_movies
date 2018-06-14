<?php include("../paginas/cabe.php");

$id_resolucao = "";
$id_resolucao = "";
$id_formato = "";
$nome_formato = "";
$id_idioma = "";
$nome_idioma = "";
$id_genero = "";
$nome_genero = "";
?>
<?php  include '../conexao.php';?>
<div class="container">
  <form class="borda" action='updfilme.php' method='get'>
    <div class='col-md-12 justify-content-center'>
      <div class='bord row'>
      <figure class='figure'>
        <?php $sql = "SELECT F.NOME AS FILMENOME, F.ANO AS ANOFILME, F.DURACAO AS DURAFILME,
        F.IMG, F.SINOPSE,F.DIRETOR,F.ATOR, C.NOMECAT AS CATNOME,FF.idFormato as FORID,I.idIdioma AS IDIOID, I.NOME AS IDIFILME,C.idCategoria AS CATEID,R.NOME AS RESUFILME,R.idresolucao AS RESUID, FF.NOME AS FFNOME
        FROM FILMES AS F, IDIOMA AS I,RESOLUCAO AS R,CATEGORIA AS C,FORMATO AS FF
        WHERE F.idFilmes = '{$_GET['id']}'
        AND C.idCategoria = F.Categoria_idCategoria
        AND I.idIdioma = F.Idioma_idIdioma
        AND FF.idFormato = F.Formato_idFormato
        AND R.idresolucao = F.resolucao_idresolucao";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            $si=$row['SINOPSE'];
            $id_resolucao=$row['RESUID'];
            $nome_resolucao=$row['RESUFILME'];
            $id_formato=$row['FORID'];
            $nome_formato=$row['FFNOME'];
            $id_idioma=$row['IDIOID'];
            $nome_idioma=$row['IDIFILME'];
            $id_genero=$row['CATEID'];
            $nome_genero=$row['CATNOME'];

            echo "
            <img src='".$row["IMG"]."' class='figure-img img-fluid rounded' alt=''>
            <figcaption class='figure-caption'></figcaption>
            </figure>

            <div class='add3 form-group col-md-4'>
            <label for='inputAddress'><span style='color:red;'>Nome do Filme</span></label>
            <input type='text' class='form-control' id='nome' name='nome' placeholder='Nome...' value='{$row['FILMENOME']}'/>
            <input type='hidden' id='id' name='id' value='{$_GET['id']}'/>

            <label for='inputAddress'><span style='color:red;'>Ano de Lamçamento</span></label>
            <input type='text' class='form-control' id='ano' name='ano' placeholder='Ano...' value='{$row['ANOFILME']}'/>

            <label for='inputAddress'><span style='color:red;'>Duração do Filme</span></label>
            <input type='text' class='form-control' id='duracao' name='duracao' placeholder='Duração...' value='{$row['DURAFILME']}'/>

            <label for='inputAddress'><span style='color:red;'>Diretor do Filme</span></label>
            <input type='text' class='form-control' id='diretor' name='diretor' placeholder='Diretor...' value='{$row['DIRETOR']}'/>

            <label for='inputAddress'><span style='color:red;'>Ator Principal do Filme</span></label>
            <input type='text' class='form-control' id='ator' name='ator' placeholder='Ator...' value='{$row['ATOR']}'/>
            </div>
            <div class='add3 form-group col-md-4'>
            <label for='inputAddress'><span style='color:red;'>Formato do Filme</span></label>";

            ?>
            <select id="formato" class="genero form-control" name="formato">
              <?php
              echo "<option value=". $id_formato .">". $nome_formato ."</option>";
              $sql = "SELECT Nome,idFormato FROM formato";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  if($row["idFormato"] != $id_formato){
                    echo "<option value=". $row["idFormato"] .">". $row["Nome"] ."</option>";
                  }
                }
              } else {
                echo "0 results";
              }
              ?>
            </select>

            <?php

            echo"


            <label for='inputAddress'><span style='color:red;'>Resolucao do Filme</span></label>
            <select id='resolucao' class='genero form-control' name='resolucao'>
            <option value=". $id_resolucao .">". $nome_resolucao ."</option>";
            ?>
            <?php
            $sql = "SELECT Nome,idresolucao FROM resolucao";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                if( $row["idresolucao"] != $id_resolucao){
                  echo "<option value=". $row["idresolucao"] .">". $row["Nome"] ."</option>";
                }
              }
            } else {
              echo "0 results";
            }
            ?>
          </select>

          <?php

          echo"

          <label for='inputAddress'><span style='color:red;'>Idioma do Filme</span></label>";

          ?>

          <select id="idioma" class="genero form-control" name="idioma">
            <?php
            echo "<option value=". $id_idioma .">". $nome_idioma ."</option>";
            $sql = "SELECT Nome,idIdioma FROM idioma";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                if($row["idIdioma"] != $id_idioma){
                  echo "
                  <option value=". $row["idIdioma"] .">". $row["Nome"] ."</option>
                  ";
                }
              }
            } else {
              echo "0 results";
            }
            ?>
          </select>

          <?php

          echo"<label for='inputState'><span style='color:red;'>Gênero</span></label>";

          ?>

          <select id="categoria" class="genero form-control" name="categoria">
            <?php
            echo "<option value=". $id_genero .">". $nome_genero ."</option>";
            $sql = "SELECT NomeCat,idcategoria FROM categoria";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                if ($row["idcategoria"] != $id_genero){
                  echo "
                  <option value=". $row["idcategoria"] .">". $row["NomeCat"] ."</option>
                  ";
                }
              }
            } else {
              echo "0 results";
            }
            ?>
          </select>

          <?php

          echo"

          <label for='inputState'><span style='color:red;'>Sinopse</span></label>
          <input type='text' class='form-control' id='sinopse' name='sinopse' placeholder='Sinopse...' value='{$si}'/>
          </div>
          </div>
          </div>
          ";
        }
      } else {
        echo "0 results";
      }
      ?>
      <div class="text-center">
        <button type="submit" class="btn btn-outline-danger" style="margin-top:25px;">ATUALIZAR</button>
      </div>
    </div>
    </form>
  </div>
  <?php include("../paginas/rodape.php") ?>
