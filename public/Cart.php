<?php

use app\classes\Cart;
use app\classes\CartProducts;

session_start();
require '../vendor/autoload.php';


$cartProducts = new CartProducts;
//echo "<pre>" .print_r($cartProducts->products(), true). "</pre>";
$products = $cartProducts->products(new Cart);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <h2>Cart | <a href="index.php">Home</a></h2>
    <hr>
    <div id="container">
        <?php if(count($products['products']) <= 0 ): ?>
            <h3>Nem Produto no carrinho de compras</h3>
            <?php else: ?>
            <ul> 
                <?php foreach($products['products'] as $product): ?>
                <li>
                  <?php echo $product['product'] ?>
                  <form action="quantidade.php" method="get">
                    <input type="text" name="qty" value="<?php echo $product['qty']?>" id = "cart-input-qty">
                    <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                </form> X R$ <?php echo number_format($product['price'], 2 , ',', '.')?> | R$ <?php echo number_format($product['subtotal'], 2 , ',', '.')?>
               <a href="remove.php?id=<?php echo $product['id'] ?>" id="cart-remove">Remover</a>
            </li>
                <?php endforeach ?>
            </ul>
            <div> 
                <span id="cart-total">
                    Total: R$ <?php echo number_format($products['total'], 2, ',', '.') ?>
                </span>

                <span id="cart-clear">
                    <a href="clear.php">Clear Cart</a>
                </span>
            </div>
        <?php endif ?>
    </div>
</body>
</html>