<!DOCTYPE html>
<html lang="pt">
    <?php include "../head.php"; ?>
    <head>
        <title>LIST</title>
    </head>
<body>
    <?php include "../header.php"; ?>
    
    <section>
        <h1>Listagem de itens</h1>
        <div>
            <?php
                include "../../app/db/db_connection.php";

                $result = $conn->query("SELECT * FROM users");
                
                if($result-> num_rows > 0){
                    echo "<form action='' method='POST'>";
                    
                    echo "<ul>";
                    foreach($result->fetch_all() as $row){
                        echo "<li id='$row[0]'><input type='checkbox' name='user_ids[]' value='$row[0]'> ".$row[0]." - ".$row[1]."</li>";
                    }
                    echo "</ul>";
                    echo '<button type="submit" name="delete" value="delete">Excluir Selecionados</button>';
                }
                else{
                    echo "<p>Nenhum usuario para mostrar.</p>";
                }

                if(isset($_POST['delete']) && !empty($_POST['user_ids'])){
                    $placeholders = "";
                    foreach ($_POST['user_ids'] as $user){
                        $placeholders = $placeholders . "?,";
                    }
                    $placeholders = rtrim($placeholders,",");
                    
                    $stmt = $conn->prepare("DELETE FROM users WHERE id IN ($placeholders)");

                    $types = str_repeat("s", count($_POST['user_ids']));
                    $stmt->bind_param($types, ...$_POST['user_ids']);

                    if($stmt->execute()){
                        echo '<script type="text/javascript">';
                        echo 'alert("Sucesso ao deletar usuario.");';
                        echo 'window.location.href = window.location.href;';
                        echo '</script>';
                    }
                    else{
                        echo '<script type="text/javascript">';
                        echo 'alert("Erro ao deletar usuario.");';
                        echo 'window.location.href = window.location.href;';
                        echo '</script>';
                    }
                }
                    
            ?>
        </div>
    </section>
    
    <?php include "../footer.php"; ?>

</body>
</html>