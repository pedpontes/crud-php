<!DOCTYPE html>
<html lang="pt">
    <?php include "../head.php"; ?>
    <head>
        <title>ADD</title>
    </head>
<body>
    <?php include "../header.php"; ?>
    
    <section>
        <h1>Adicionar de itens</h1>
        <form action="" method="post">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name">
            <button class="btn btn-success">
                Enviar
            </button>
        </form>
    </section>

    <?php
        include "../../app/db/db_connection.php";

        if(array_key_exists("name", $_POST) && $_POST["name"] != ""){
            $name = $_POST["name"];
            
            $stmt = $conn->prepare("INSERT INTO users (name) VALUES (?)");
            // print_r($stmt);
            if($stmt){
                $stmt->bind_param('s', $name);
                echo $stmt->execute() ? "Nome adicionado!": "Erro ao adicionar nome!";
                $stmt->close();
            }
        }
    ?>
    
    <?php include "../footer.php"; ?>

</body>
</html>