<?php 

function required() {
    if($_POST) {
        $errors = array();
        if (empty($_POST ["name"]) || empty($_POST ["details"]) || empty($_POST ["price"])){
            $errors[] = '<div class="alert alert-danger" role="alert">
            Please, fill in all required fields!
          </div>';
        }
        if (empty($errors)) {
            header('Location: index.php?status=ok');
        } else {
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
        }
        return $errors;
    }
}

    
function build_form($name, $idb, $idc, $idg, $details, $price , $image){
    $form = '<form class="col-12" action="" method="post">
        <div class="form-group"><label for="name">*Watch:</label><input class="form-control" type="text" name="name" placeholder="Name of the watch" value="' . htmlspecialchars(stripslashes($name)) . '"></div>
        <div class="d-flex">
            <div class="mr-3 form-group"><label class="mr-1" for="brand">*Brand:</label>
            <select name="brand">';
            require 'brand.php';
            foreach ($brand as $key => $valuebrand) {
                    $select = '';
                    if ($idb==$key)
                    {
                        $select='selected';
                    }
                    $form .= "<option value=$key " . $select . ">$valuebrand</option>";
                }
            $form .=  '</select></div>
            <div class="mr-3 form-group"><label class="mr-1" for="category">*Category:</label>
            <select name="category">';
            require 'category.php';
            foreach ($category as $keycat => $valuecat) {
                    $select = '';
                    if ($idc==$keycat)
                    {
                        $select='selected';
                    }
                    $form .= "<option value=$keycat " . $select . ">$valuecat</option>";
                }
            $form .=  '</select></div>
            <div class="form-group"><label class="mr-1" for="gender">*Gender:</label>
            <select name="gender">';
            require 'gender.php';
            foreach ($gender as $keygen => $valuegen) {
                    $select = '';
                    if ($idg==$keygen)
                    {
                        $select='selected';
                    }
                    $form .= "<option value=$keygen " . $select . ">$valuegen</option>";
                }
            $form .=  '</select></div>
        </div>
        <div class="form-group"><label for="details">*Details:</label><textarea class="form-control" name="details" id="details" row="3" placeholder="Write here some more details about watches">'. htmlspecialchars(stripslashes($details)) .'</textarea></div>
        <div class="form-group"><label for="price">*Price:</label><input class="form-control" type="number" name="price" placeholder="Price in CZK" value="' . $price . '"></div>
        <div class="form-group"><label for="image">Image:</label><input class="form-control" type="text" name="image" placeholder="Enter path to img: /img/nameofimage.typeofimage" value="' . htmlspecialchars(stripslashes($image)) . '"></div>
        <div class=" d-flex justify-content-between">
            <p>Field assigned with * are required.</p>
            <input class="form-control btn btn-primary w-25" type="submit" value="Submit">
        </div>
        </form>';
    return $form;
}