<?php include("../conexao.php");

$sql = "DELETE FROM formato WHERE idFormato=". $_GET["id"] ."";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

$redirect = "http://localhost/paginas/add-formato.php";
header("location:$redirect");
