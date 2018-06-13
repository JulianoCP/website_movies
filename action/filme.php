<?php include("../paginas/cabe.php"); ?>
<?php  include '../conexao.php';?>
<div class="container">

<?php $sql = "SELECT F.NOME AS FILMENOME, F.ANO AS ANOFILME, F.DURACAO AS DURAFILME,
        F.IMG, F.SINOPSE,F.DIRETOR,F.ATOR, C.NOMECAT AS CATNOME, I.NOME AS IDIFILME,R.NOME AS RESUFILME, FF.NOME AS FFNOME
        FROM FILMES AS F, IDIOMA AS I,RESOLUCAO AS R,CATEGORIA AS C,FORMATO AS FF
        WHERE F.idFilmes = '{$_GET['id']}'
        AND C.idCategoria = F.Categoria_idCategoria
        AND I.idIdioma = F.Idioma_idIdioma
        AND FF.idFormato = F.Formato_idFormato
        AND R.idresolucao = F.resolucao_idresolucao";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      echo "<div class='bord'>
      <div class='row justify-content-center'>

          <figure class='figure'>
            <img src='".$row["IMG"]."' class='figure-img img-fluid rounded' alt=''>
            <figcaption class='figure-caption'></figcaption>
          </figure>
          <div class='add2 col-md-8'>
            <label for='inputAddress'><span style='color:red;'>Nome do Filme : <span style='color:white;'>".$row["FILMENOME"]."</span></span></label>
            <br>
            <label for='inputAddress'><span style='color:red;''>Ano de Lamçamento :<span style='color:white;'> ".$row["ANOFILME"]."</span></span></label>
            <br>

            <label for='inputAddress'><span style='color:red;'>Duração do Filme : <span style='color:white;'>".$row["DURAFILME"]."</span></span></label>
            <br>

            <label for='inputAddress'><span style='color:red;'>Resolucao do Filme : <span style='color:white;'>".$row["RESUFILME"]."</span></span></label>
            <br>

            <label for='inputAddress'><span style='color:red;'>Idioma do Filme : <span style='color:white;'>".$row["IDIFILME"]."</span></span></label>
            <br>

            <label for='inputState'><span style='color:red;'>Gênero do Filme : <span style='color:white;'>".$row["CATNOME"]."</span></span></label>
            <br>

            <label for='inputState'><span style='color:red;'>Diretor do Filme : <span style='color:white;'>".$row["DIRETOR"]."</span></span></label>
            <br>

            <label for='inputState'><span style='color:red;'>Ator Principal do Filme : <span style='color:white;'>".$row["ATOR"]."</span></span></label>
            <br>

            <label for='inputState'><span style='color:red;'>Formato do Filme : <span style='color:white;'>".$row["FFNOME"]."</span></span></label>
            <br>

            <label for='inputState'><span style='color:red;'>Sinopse : <span style='color:white;'>".$row["SINOPSE"]."</span></span></label>
            </div>
          </div>
        </div>";
    }
  } else {
    echo "0 results";
  }
  ?>
  <div class="text-center">
    <a href="#"><button data-toggle="modal" data-target="#downloadModal" type="button" class="btn btn-outline-danger" style="margin-top: 35px;">DOWNLOAD</button></a>
  </div>
</div>
<div class="modal fade bd-example-modal-sm" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <p class="text-center">O Download ta OFF</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include("../paginas/rodape.php") ?>
