<?php

try{
    $conn = new PDO('mysql:host=localhost;dbname=listatarefas', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
        echo 'Error: ' . $e->getMessage();
}



?>