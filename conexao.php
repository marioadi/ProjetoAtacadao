<?php

try{

	$pdo = new PDO("mysql:dbname=base_atacadao;host=localhost","mariojunior", "admproject123");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
	echo "Erro no Banco".$e->getMessage();
	exit;
}


?>