<?php

include('config.php');

$list = $conn->query("SELECT * FROM tarefas");

if(isset($_POST['submit'])){

    $tarefa = $_POST['tarefa'];

    $pdo = $conn->query("SELECT * FROM tarefas");

    if($tarefa === ""){
        echo "<script>alert('Por favor, adicione uma tarefa!!')</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO tarefas(tarefa) VALUES('$tarefa')");
        $stmt->execute();
        echo "<script> location.href='index.php'</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/3dfd196d26.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Lista de Tarefas</title>
</head>
<body>
    <div class="wrapper">
        <h2 class="title">Lista de Tarefas</h2>
        <div class="inputFields">
            <form action="" method="post">
            <input type="text" name="tarefa" id="taskValue" placeholder="Entre com a Tarefa">
            <button type="submit" id="addBtn" class="btn"><input type="submit" name="submit" value="+"></button>
            </form>
        </div>
    </div>
    <div class="content">
        <ul>
            <?php if($list->rowCount() > 0){ while($row = $list->fetch(PDO::FETCH_OBJ)){ ?>
            
               <li><?php echo $row->tarefa; ?> <a  href="javascript: if(confirm('Tem certeza que deseja excluir a tarefa <?php echo $row->tarefa; ?>')) location.href='excluir.php?id=<?php echo $row->id ?>';"><i class="icon fa fa-trash"></i></a></li><br>
            
            <?php }
                    echo '<li class="pending-text">Você tem ' .$list->rowCount(). ' tarefas pendentes</li>';
                } else{
                    echo "<li><span>Nenhum registro encontrado!!</span></li>";
                }  ?>
        </ul>
    </div>
</body>
</html>