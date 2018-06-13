<?php include("../paginas/cabe.php"); ?>
<?php  include '../conexao.php';?>

<?php
$sql="UPDATE `filmeshd`.`categoria` SET `NomeCat`='" . $_GET["nome"] ."' WHERE `idcategoria`='". $_GET["id"] ."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


$redirect = "http://localhost/admin";
header("location:$redirect");

?>
