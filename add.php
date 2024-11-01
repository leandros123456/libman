<?php

include "conn.php";


$userid = $_POST["userid"];
$bookid = $_POST["bookid"];

$sql = "INSERT INTO `emprestimo` (`usuario`, `livro`)
VALUES ($userid, $bookid)";

$conn->query($sql);

header("location: monitor.php");