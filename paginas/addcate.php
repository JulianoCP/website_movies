<?php include("cabe.php");
include '../conexao.php';?>

<div class="container">
  <div class="row justify-content-center">
    <div class="alert alert-danger justify-content-center" role="alert">
      Problema ao cadastrar o Genero!
    </div>
  </div>
  <div class="row justify-content-center botom">
    <a href="admin.php"><small class="text-center"><button type="button" class="btn btn-outline-light">VOLTAR AO PAINEL DE ADMIN</button></small></a>
  </div>
</div>


<?php
 $sql="INSERT INTO `filmeshd`.`categoria` (`NomeCat`) VALUES ('" . $_GET["nome"] ."');";
if (mysqli_query($conn, $sql)) {
  echo "Adicionado com Sucesso";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$redirect = "http://localhost/admin";
header("location:$redirect");
?>

<?php include("rodape.php") ?>
