<?php 

use app\classes\Cart;
session_start();
require '../vendor/autoload.php';


//echo $id;
$cart = new Cart;
$cart->clear();

header('location: cart.php');

?>