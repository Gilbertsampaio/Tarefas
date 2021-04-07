<?php
ini_set('default_charset','UTF-8');
?>
<?php 
session_start();
include_once("conexao.php");
?>
<?php 

	$ID = mysqli_real_escape_string($connect,$_GET['ID']);	
	mysqli_query($connect,"DELETE FROM tarefas WHERE ID = '$ID'");
	
?>