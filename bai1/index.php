<?php
require_once "models/database.php";
require_once "controllers/productController.php";
require_once "controllers/brandController.php";
$ctr = $_GET['ctr'] ?? ''; // toán tử 2 ngôi php8

switch ($ctr) {
    case '':
        include_once "views/home.php";
        break;
    case 'home':
        include_once "views/home.php";
        break;
    case 'product':
        indexProduct();
        break;
    case 'addProduct':
        addProduct();
        break;
    case 'add-product':
        storeProduct();
        break;
    case 'editProduct':
        editProduct();
        break;
    case 'update-product':
        updateProduct();
        break;
        case 'delete':
            delete();
            break;
    default:
        include_once "views/404.php";
        break;
}
?>