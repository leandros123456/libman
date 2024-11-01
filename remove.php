<?php

include "conn.php";

$id = $_POST["id"];
$sql = "DELETE FROM `emprestimo` where id = $id";
$conn->query($sql);

header("location: monitor.php");