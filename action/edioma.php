<?php include("../paginas/cabe.php");
?>
<?php  include '../conexao.php';?>
<div class="container">
  <form class="borda" action='updidio.php' method='get'>
    <div class='row justify-content-center'>
      <?php $sql = "SELECT NOME
                    FROM IDIOMA
                    WHERE idIdioma = '{$_GET['id']}'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
          echo "<div class='form-group mx-sm-3 mb-2'>
          <input type='text' class='form-control' id='nome' name='nome' placeholder='Genero...' value='{$row['NOME']}'>
          <input type='hidden' id='id' name='id' value='{$_GET['id']}'/>
          </div>";

        }
      } else {
        echo "0 results";
      }
     ?>
      <div class="text-center">
        <button type="submit" class="btn btn-outline-light mb-2">ATUALIZAR</button>
      </div>
    </form>
  </div>
</div>
