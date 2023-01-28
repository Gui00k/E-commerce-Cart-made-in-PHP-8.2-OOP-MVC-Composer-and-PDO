<?php 

use app\classes\Cart;
session_start();
require '../vendor/autoload.php';


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
//echo $id;
$cart = new Cart;
$cart->remove($id);

header('location: cart.php');

?>