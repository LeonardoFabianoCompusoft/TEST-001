<?php
#definindo o banco de dados
$dsn = 'mysql:host=localhost;dbname=dbGenT';
$username = 'root';
$password = '';

#conexao com o banco de dados
try{
    $pdo = new PDO("mysql:host=localhost;dbname=dbGenT", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo 'Erro de conexão: '.$e->getMessage();
}

?>