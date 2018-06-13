<?php include("../paginas/cabe.php"); ?>
<?php  include '../conexao.php';?>

<?php

$sql="UPDATE `filmeshd`.`filmes` SET `Nome`='" . $_GET["nome"] ."', `Ano`='" . $_GET["ano"] ."', `Duracao`='" . $_GET["duracao"] ."', `Sinopse`='" . $_GET["sinopse"] ."', `Diretor`='" . $_GET["diretor"] ."', `Ator`='" . $_GET["ator"] ."', `categoria_idcategoria`='" . $_GET["categoria"] ."', `resolucao_idresolucao`='" . $_GET["resolucao"] ."', `idioma_idIdioma`='" . $_GET["idioma"] ."', `Formato_idFormato`='" . $_GET["formato"] ."' WHERE `idFilmes`='". $_GET["id"] ."'
";
echo $sql;
echo "<br>";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


$redirect = "http://localhost/admin";
header("location:$redirect");

?>
