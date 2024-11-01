<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['passw'];
    
    include "conn.php";

    $sql = "SELECT * FROM `funcionarios` WHERE
        `identificacao` = '$login'
        AND `senha` = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("location: monitor.php");
    } else {
        echo "Login ou senha incorretos.";
    }

} else {
    echo "Método de requisição inválido.";
}

?>