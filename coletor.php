<?php
$url = "http://omdbapi.com/?t=" . urlencode($_GET['titulo']) . "&apikey=4f37fdcc";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$getcontent = curl_exec($ch);
curl_close($ch);
include('conexao.php');
$result = json_decode($getcontent);

$sql = "INSERT INTO `filmeshd`.`filmes` (`Nome`, `Ano`, `Duracao`, `img`, `Sinopse`, `Diretor`, `Ator`, `categoria_idcategoria`, `resolucao_idresolucao`, `idioma_idIdioma`, `Formato_idFormato`) VALUES ('" . $result->Title . "', '" . $result->Year ."', '" . $result->Runtime ."', '" . $result->Poster ."', '" . $result->Plot ."', '" . $result->Director ."', '" . $result->Actors ."', '17', '13', '32', '4');";

if (mysqli_query($conn, $sql)) {
 echo "Adicionado com Sucesso";
} else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
