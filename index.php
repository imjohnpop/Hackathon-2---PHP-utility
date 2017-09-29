<?php
require_once 'form.php';
require_once 'db.php';
require 'category.php';
require 'gender.php';
require 'brand.php';
$db = db_connect();

if ($_POST) {
    $stmt = $db->prepare('INSERT INTO watches (name, brand, category, gender, details, price) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$_POST['name'], $_POST['brand'], $_POST['category'], $_POST['gender'], $_POST['details'], $_POST['price']]);

    header ("Location: index.php?status=ok");// changes the method from post to get
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
</head>
<body class="d-flex flex-column justify-content-around">

    <section class="container my-5 py-2 border border-dark">
        <?php if (isset($_GET['status']) && $_GET['status'] == 'ok')
        {echo '<h1 class="text-uppercase text-center">You have added a watch!</h1>';}
        else { echo '<h1 class="text-uppercase text-center">Add a watch</h1>';}?>
        <a href="/hackathon%232/Hackathon-2---PHP-utility/list.php">Go to the list of products</a>
    </section>
    
    <div class="container">
        <section id="form" class="row pb-4 pt-5 border border-dark">
            <?php 
                echo build_form('','','','','','','');
            ?>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>