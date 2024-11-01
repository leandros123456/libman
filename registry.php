<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST["isbn_code"];
    $titulo = $_POST["title"];
    $autor = $_POST["author"];
    $pais = $_POST["country"];
    $editora = $_POST["editor"];
    $edicao = $_POST["edition"];


    include "conn.php";

    $sql = "INSERT INTO `modelos` (`isbn`, `titulo`, `autor`, `pais`, `editora`, `edicao`)
    VALUES ('$isbn', '$titulo', '$autor', '$pais', '$editora', '$edicao')";

    $conn->query($sql);

    header("location: monitor.php");
} else {
    echo "Método de requisição inválido.";
}
