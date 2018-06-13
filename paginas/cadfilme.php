<?php include("cabe.php") ?>
<?php  include '../conexao.php';?>
<div class="container">
  <div class="row justify-content-center">
    <div class="alert alert-danger justify-content-center" role="alert">
      Problema ao cadastrar o filme!
    </div>
  </div>
  <div class="row justify-content-center botom">
    <a href="admin.php"><small class="text-center"><button type="button" class="btn btn-outline-light">VOLTAR AO PAINEL DE ADMIN</button></small></a>
  </div>
</div>

<?php
 $sql="INSERT INTO `filmeshd`.`filmes` (`Nome`, `Ano`, `Duracao`,  `img`, `Sinopse`, `Diretor`, `Ator`, `categoria_idcategoria`, `resolucao_idresolucao`, `Idioma_idIdioma`, `Formato_idFormato`) VALUES ('" . $_GET["nome"] ."', '" . $_GET["ano"] ."', '" . $_GET["duracao"] ."', '" . $_GET["img"] ."', '" . $_GET["sinopse"] ."', '" . $_GET["diretor"] ."', '" . $_GET["ator"] ."', '" . $_GET["categoria"] ."','" . $_GET["resolucao"] ."',  '" . $_GET["idioma"] ."',  '" . $_GET["formato"] ."');";
if (mysqli_query($conn, $sql)) {
  echo "Adicionado com Sucesso";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$redirect = "http://localhost/admin";
header("location:$redirect");
?>
