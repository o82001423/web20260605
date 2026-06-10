<?php 
include_once "db.php";

$table=$_GET['table'];
$bd=${ucfirst($table)};
$bd->save($_POST);


to("../admin.php?do=$table");
?>