<?php include("../paginas/cabe.php"); ?>
<?php  include '../conexao.php';?>

<?php
$sql="UPDATE `filmeshd`.`resolucao` SET `Nome`='" . $_GET["nome"] ."' WHERE `idresolucao`='". $_GET["id"] ."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


$redirect = "http://localhost/admin";
header("location:$redirect");

?>
