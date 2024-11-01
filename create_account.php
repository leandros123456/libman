<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['passw'];
    $userid = $_POST['userid'];
    $password_confirm = $_POST['passw_again'];
    $id_instituicao = $_POST['institution'];

    if ($password === $password_confirm) {
        echo "Conta criada com sucesso, $username!";
        include "conn.php";

$sql = "INSERT INTO `funcionarios` (`nome`, `senha`, `identificacao`, `id_instituicao`)
        VALUES ('$username', '$password', '$userid', '$id_instituicao')";

        $conn->query($sql);
    } else {
        echo "Erro: As senhas não coincidem.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
