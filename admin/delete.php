<?php
    require "database.php";

    if(!empty($_GET['id']))
    {
        $id = checkInput($_GET["id"]);
    }

    if(!empty($_POST))  // suppression
    {
        $id = checkInput($_POST["id"]);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM items WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
    }
 
    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/779178b8c5.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/style.css">
        <title>Burgerland</title>
    </head>
    <body>
        <h1 class="text-logo"><i class="fas fa-utensils"></i> Burgerland <i class="fas fa-utensils"></i></h1>
        <div class="container admin">
            <div class="row">
                    <h1><strong>Supprimer un item</strong></h1>
                    <br>
                    <form class="form" role="form" action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <p class="alert alert-warning">Etes-vous sûr de vouloir supprimer?</p>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-warning">Oui</button>
                            <a class="btn btn-default" href="index.php">Non</a>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </body>
</html>
