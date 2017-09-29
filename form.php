<?php 
function build_form($id, $name, $brand, $category, $gender, $details, $price){
    $form = '<form class="col-12" action="" method="post">
        <div class="form-group"><label for="name">Watch:</label><input class="form-control" type="text" name="name" placeholder="Name of the watch" value="' . htmlspecialchars($name) . '"></div>
        <div class="d-flex">
            <div class="mr-3 form-group"><label class="mr-1" for="brand">Brand:</label>
            <select name="brand">';
            require 'brand.php';
            foreach ($brand as $key => $valuebrand) {
                    $select = '';
                    if ($id==$key)
                    {
                        $select='selected';
                    }
                    $form .= "<option value=$key " . $select . ">$valuebrand</option>";
                }
            $form .=  '</select></div>
            <div class="mr-3 form-group"><label class="mr-1" for="category">Category:</label>
            <select name="category">';
            require 'category.php';
            foreach ($category as $keycat => $valuecat) {
                    $select = '';
                    if ($id==$keycat)
                    {
                        $select='selected';
                    }
                    $form .= "<option value=$keycat " . $select . ">$valuecat</option>";
                }
            $form .=  '</select></div>
            <div class="form-group"><label class="mr-1" for="gender">Gender:</label>
            <select name="gender">';
            require 'gender.php';
            foreach ($gender as $keygen => $valuegen) {
                    $select = '';
                    if ($id==$keygen)
                    {
                        $select='selected';
                    }
                    $form .= "<option value=$keygen " . $select . ">$valuegen</option>";
                }
            $form .=  '</select></div>
        </div>
        <div class="form-group"><label for="details">Details:</label><textarea class="form-control" name="details" id="details" row="3" placeholder="Write there sume more details about watches">'. htmlspecialchars($details) .'</textarea>
        <div class="form-group"><label for="price">Price:</label><input class="form-control" type="number" name="price" placeholder="Price in CZK" value="' . $price . '"></div>
        <div class=" d-flex justify-content-end">
            <input class="form-control btn btn-primary w-25" type="submit" value="Submit">
        </div>
    </form>';
    return $form;
}