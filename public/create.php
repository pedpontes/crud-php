<!DOCTYPE html>
<html lang="pt">
    <?php require_once "head.php"; ?>
    <head>
        <title>ADD</title>
    </head>
    <body>
        <?php include "header.php"; ?>
        
        <section>
            <h1>Adicionar de itens</h1>
            <form action="" method="post">
                <label for="name">Nome:
                    <input type="text" name="name" id="name">
                </label>
                <input type="submit" value="Enviar">
            </form>
        </section>
        
        <?php                        
            $conn = getDBConnnection();

            if(array_key_exists("name", $_POST) && $_POST["name"] != ""){
                $name = $_POST["name"];
                
                $stmt = $conn->prepare("INSERT INTO users (name) VALUES (?)");
                if($stmt){
                    $stmt->bind_param('s', $name);
                    echo $stmt->execute() ? "Nome adicionado!": "Erro ao adicionar nome!";
                    $stmt->close();
                }
            }
        ?>
        <?php include "footer.php"; ?>
    </body>
</html>