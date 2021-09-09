<?php

include('config.php');

$tarefa_id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM tarefas WHERE id = '$tarefa_id'");
$stmt->execute();


if($stmt){
    echo "<script>location.href='index.php'</script>";
} else {
    echo "<script>alert('Não foi possível deletar a tarefa!!')</script>";
    echo "<script>location.href='index.php'</script>";
}


?>