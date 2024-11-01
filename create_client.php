<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    include "conn.php";

    header("location: monitor.php");

    $sql = "INSERT INTO `clientes` (`nome`, `cpf`, `email`, `telefone`, `endereco`)
            VALUES ('$nome', '$cpf', '$email', '$telefone', '$endereco')";

    $conn->query($sql);
} else {
    echo "Método de requisição inválido.";
}