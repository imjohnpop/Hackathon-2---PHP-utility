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

    if ($_POST) {
        $stmt = $db->prepare("DELETE FROM watches WHERE id='$watch[id]'");
        $stmt->execute();
        $watches = $stmt->fetchAll();
        header('Location: list.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>U2-Ecommerce | List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,400,700" rel="stylesheet">

    <style>
        body {
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>
<body class="bg-dark">

    <div class="py-3 container">
        <a class="btn btn-primary" href="index.php">Go to the form</a>
    </div>

    <div class="container">
        <div class="row">
            <?php foreach ($watches as $watch) : ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
                <div class="card bg-white text-dark">
                    <img class="card-img-top" src="<?= htmlspecialchars(stripslashes($watch['image']))?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?= htmlspecialchars(stripslashes($watch['name']))?></h4>
                        <a class="btn btn-primary btn-block btn-sm" data-toggle="collapse" href="#collapse<?= $watch['id']; ?>" aria-expanded="false" aria-controls="collapse<?= $watch['id']; ?>">See details</a>
                        <div class="collapse" id="collapse<?= $watch['id']; ?>">
                            <p class="card-text"><small><?= htmlspecialchars(stripslashes($watch['details']))?></small></p>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-white text-dark"><strong>Brand:</strong> <small><?= htmlspecialchars(stripslashes($brand[$watch['brand']]))?></small></li>
                        <li class="list-group-item bg-white text-dark"><strong>Category:</strong> <small><?= htmlspecialchars(stripslashes($category[$watch['category']]))?></small></li>
                        <li class="list-group-item bg-white text-dark"><strong>Gender:</strong> <small><?= htmlspecialchars(stripslashes($gender[$watch['gender']]))?></small></li>
                        <li class="list-group-item bg-white text-dark"><strong>Price:</strong> <small><?= htmlspecialchars($watch['price'])?></small> ,- CZK</li>
                    </ul>
                    <div class="card-body">
                        <a class="btn btn-primary btn-block" href="<?= 'edit.php?id=' . htmlspecialchars(stripslashes($watch['id'])) . '&status=edit'; ?>" class="card-link">Edit</a>
                        <form class="mt-1" action="list.php" method="post">

                            <input class="btn btn-primary btn-block" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>    
</body>
</html>