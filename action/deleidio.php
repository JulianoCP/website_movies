<?php include("../conexao.php");

$sql = "DELETE FROM idioma WHERE idIdioma=". $_GET["id"] ."";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

$redirect = "http://localhost/admin";
header("location:$redirect");
