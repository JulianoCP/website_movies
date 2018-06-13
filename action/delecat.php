<?php include("../conexao.php");

$sql = "DELETE FROM categoria WHERE idcategoria=". $_GET["id"] ."";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

$redirect = "http://localhost/paginas/add-cate.php";
header("location:$redirect");
