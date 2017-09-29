<?php 
function build_form($name, $brand, $category, $gender, $details, $price){
    $form = '<form class="col-6" action="" method="post">
        <div class="form-group"><label for="name">Watch:</label><input class="form-control" type="text" name="name" placeholder="Name of the watch" value="' . htmlspecialchars($name) . '"></div>
        <div class="form-group"><label for="brand">Brand:</label><input class="form-control" type="text" name="brand" placeholder="Brand of the watch" value="' . htmlspecialchars($brand) . '"></div>
        <div class="form-group"><label class="mr-1" for="category">Category:</label>
        <select name="category">';
        require 'category.php';
        foreach ($category as $key => $valuecat) {
                $select = '';
                if ($id==$key)
                {
                    $select='selected';
                }
                $form .= "<option value=$key " . $select . ">$valuecat</option>";
            }
        $form .=  '</select></div>
        <div class="form-group"><label class="mr-1" for="gender">Gender:</label>
        <select name="gender">';
        require 'gender.php';
        foreach ($gender as $key => $value) {
                $select = '';
                if ($id==$key)
                {
                    $select='selected';
                }
                $form .= "<option value=$key " . $select . ">$valuegen</option>";
            }
        $form .=  '</select></div>
        <div class="form-group"><label for="price">Price:</label><input class="form-control" type="number" name="price" value="' . htmlspecialchars($price) . '"></div>
        <div class=" d-flex justify-content-end">
            <input class="form-control btn btn-primary w-25" type="submit" value="Submit">
        </div>
    </form>';
    return $form;
}