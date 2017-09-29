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
        <a href="index.php">Go to the form</a>
        <hr>
    <div class="container">
        <div class="row">
            <?php foreach ($watches as $watch) : ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card bg-dark text-light">
                    <img class="card-img-top" src="<?= htmlspecialchars($watch['image'])?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?= htmlspecialchars($watch['name'])?></h4>
                        <p class="card-text"><small><?= htmlspecialchars($watch['details'])?></small></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark text-light"><strong>Brand:</strong> <small><?= htmlspecialchars($brand[$watch['brand']])?></small></li>
                        <li class="list-group-item bg-dark text-light"><strong>Category:</strong> <small><?= htmlspecialchars($category[$watch['category']])?></small></li>
                        <li class="list-group-item bg-dark text-light"><strong>Gender:</strong> <small><?= htmlspecialchars($gender[$watch['gender']])?></small></li>
                        <li class="list-group-item bg-dark text-light"><strong>Price:</strong> <small><?= htmlspecialchars($watch['price'])?></small> ,- CZK</li>
                    </ul>
                    <div class="card-body">
                        <a class="btn btn-primary btn-block" href="<?= 'edit.php?id=' . htmlspecialchars($watch['id']) . '&status=edit'; ?>" class="card-link">Edit</a>
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