<?php   
    require_once 'form.php';
    require_once 'db.php';
    require 'category.php';
    require 'gender.php';
    require 'brand.php';
    $db = db_connect();

    $stmt = $db->prepare('SELECT * FROM watches');
    $stmt->execute();
    $watches = $stmt->fetchAll();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>U2-Ecommerce | List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
        <?php
            foreach ($watches as $watch) {
                echo 'Name: ' . htmlspecialchars($watch['name']) . '<br>';
                echo 'Brand: ' . htmlspecialchars($brand[$watch['brand']]) . '<br>';
                echo 'Category: ' . htmlspecialchars($category[$watch['category']]) . '<br>';
                echo 'Gender: ' . htmlspecialchars($gender[$watch['gender']]) . '<br>';
                echo 'Details: ' . htmlspecialchars($watch['details']) . '<br>';
                echo 'Price: ' . htmlspecialchars($watch['price']) . '<br>';
                echo '<a href="edit.php?id=' . htmlspecialchars($watch['id']) . '&status=edit">edit</a>';
                echo '<hr>';
            }
        ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>    
</body>
</html>