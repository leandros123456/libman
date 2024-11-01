<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conn.php";
    $isbn = $_POST["isbn"];

    $sql = "INSERT INTO `livros` (`modelo`) VALUES ('$isbn')";

    $conn->query($sql);

    header("location: monitor.php");
}