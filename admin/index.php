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
            <h1><strong>Liste des Items</strong></h1><a href="insert.php" class="btn btn-success btn-lg"><i class="fas fa-plus"></i> Ajouter</a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    require "database.php";
                    $db = Database::connect();
                    $statement = $db->query("SELECT items.id, items.name, items.description, items.price, categories.name AS category 
                                            FROM items LEFT JOIN categories ON items.category = categories.id
                                            ORDER BY items.id DESC");  // INNER ou LEFT
                    while($item = $statement->fetch())
                    {
                        echo '<tr>';
                        echo '<td>'. $item['name'] .'</td>';
                        echo '<td>'. $item['description'] .'</td>';
                        echo '<td>'. $item['price'] .'</td>';
                        echo '<td>'. $item['category'] .'</td>';
                        
                        echo '<td width=300>';
                        echo '<a class="btn btn-default" href="view.php?id=1' . $item['id'] .'"><i class="fas fa-eye"></i> Voir</a>';
                        echo " ";
                        echo '<a class="btn btn-primary" href="update.php?id=1' . $item['id'] .'"><i class="fas fa-pen"></i> Modifier</a>';
                        echo " ";
                        echo '<a class="btn btn-danger" href="delete.php?id=1' . $item['id'] .'"><i class="fas fa-times-circle"></i> Supprimer</a>';
                        echo " ";
                        echo '</td>';
                        echo '</tr>';  
                    }

                    ?>
                    
                </tbody>
            </table>
    
    </div>
    </body>
</html>