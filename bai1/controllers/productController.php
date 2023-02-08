<?php
function indexProduct()
{
    $products = getData("SELECT p.* ,c.brandName FROM car p JOIN brand c ON p.brand_id = c.id");
    include_once "views/product.php";
}

function addProduct()
{
    $brand = brand_select_all();
    include_once "views/addProduct.php";
}

function storeProduct()
{
    // if (isset($_GET['add-product'])) {
    if (isset($_POST['add_prd'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
        $version = $_POST['version'];
        $gear = $_POST['gear'];
        $origin = $_POST['origin'];
        $image = $_FILES['image']['name'];
        $brand_id = $_POST['brand_id'];

        move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);
        $sql = "INSERT INTO car(carName,image,price,description,version,gear,origin,brand_id) values('$name','$image','$price','$desc','$version','$gear','$origin','$brand_id' )";
        exeQuery($sql);
        header('location:?ctr=product');
        die;
    }
}

function editProduct()
{
    $rows_brand = brand_select_all();
    $get_id = $_GET['id'] ?? "";
    $row = products_select_by_id($get_id);
    include_once "views/updateProduct.php";
}

function updateProduct()
{
    $rows_brand = brand_select_all();
    $get_id = $_GET['id'] ?? "";
    if (isset($_POST['up_prd'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
        $version = $_POST['version'];
        $gear = $_POST['gear'];
        $origin = $_POST['origin'];
        $image = $_FILES['image'];
        $brand_id = $_POST['brand_id'];
        $prev_img = $_POST['prev_img'];
        $err = [];
        
        if (!$err) {
            if ($image['size'] == 0) {
                $image['name'] = $prev_img;
            }

            move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image['name']);
            products_update($get_id, $name, $image['name'], $price, $desc, $version, $gear, $origin, $brand_id);
        }
            header('location:?ctr=product');
            die;
    }
}
function delete(){
    
        $get_id = $_GET['id'] ?? "";
        products_delete($get_id);
        header('location:?ctr=product ');
        die;
    
}
?>