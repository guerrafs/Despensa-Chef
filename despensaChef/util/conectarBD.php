<?php
$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "despensachef";
    try {
        $conn = new PDO("mysql:host=$servername; port=3306; dbname=$dbname", $user, $pass);
        if ($conn) {
            echo "<script>console.log('Conexao realizada com sucesso! :)');</script>";
        }else{
            echo "<script>console.log('Falha na conexão. :(');</script>";
        }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
?>
