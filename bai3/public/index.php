<?php
// spl_autoload_register(function ($class) {
//     $path = lcfirst(str_replace("\\","/",$class));
//     require_once __DIR__ . "/../" . $path . ".php";
// });
require_once __DIR__ . "/../vendor/autoload.php";
use App\BankHD;
use App\ClassA;
use App\ClassB;

$bank = new BankHD;
$bank->tranfer(-100);

// echo '<br>' . BankHD::PI;
// echo '<br>Static ' . BankHD::$name;

$classA = new ClassA;
$classB = new ClassB;
$classA->say();
$classB->say();
$classA->eat('shit');
$classB->eat('hotdog');

