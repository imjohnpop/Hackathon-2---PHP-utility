<?php
require_once 'db.php';
require_once 'form.php';
require 'gender.php';
require 'category.php';
require 'brand.php';
$db = db_connect();

if(empty($_GET['id'])) {
    echo 'You didn\t selected any item for editing';
    echo '<a class="btn btn-primary" href="list.php">Go to the list of products</a>';
    exit();
}

$stmt = $db->prepare('SELECT * FROM watches WHERE id = ?');
$stmt->execute([$_GET['id']]);
$watches = $stmt->fetch();
if($watches == false) {
    echo 'Item with this ID doesn\'t exist';
    echo '<a class="btn btn-primary" href="list.php">Go to the list of products</a>';
    exit();
}
if($_POST) {
    $stmt = $db->prepare('UPDATE watches SET name=?, brand=?, category=?, gender=?,details=?, price=?, image=? WHERE id = ?');
    if (empty($_POST['price'])) {
        $_POST['price'] = 0;
    }
    $stmt->execute([$_POST['name'], $_POST['brand'], $_POST['category'], $_POST['gender'], $_POST['details'], $_POST['price'], $_POST['image'], $_GET['id']]);
    header ("Location: list.php?status=ok");// changes the method from post to get
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>U2-Ecommerce | Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,400,700" rel="stylesheet">

    <style>
        body {
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>
<body class="bg-dark">

    <section class="container my-3 py-2 border border-dark bg-white rounded">
        <?php if (isset($_GET['status']) && $_GET['status'] == 'ok')
        {echo '<h1 class="text-uppercase text-center">You have added a watch!</h1>';}
        elseif (isset($_GET['status']) && $_GET['status'] == 'edit') { echo '<h1 class="text-uppercase text-left">Edit your product</h1>'; }
        else { echo '<h1 class="text-uppercase text-center">Add watch</h1>';}?>
        <a class="btn btn-primary" href="list.php">Go to the list of products</a>
    </section>
    
    <div class="container">
        <section class="row pb-2 pt-4 border border-dark bg-white rounded">
            <div class="col-lg-6 col-12">
                <?php 
                    echo build_form($watches['name'], $watches['brand'], $watches['category'], $watches['gender'], $watches['details'], $watches['price'], $watches['image']);
                ?>
            </div>
            <div class="col-lg-6 col-12 mt-3 d-flex flex-row justify-content-center">
                <img class="img-fluid w-100 h-100" src="<?= $watches['image']; ?>" alt="product image">
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>