<?php

require_once 'ShoppingCart.php';
require_once 'Item.php';
require_once 'Product.php';

$shoppingCart = new ShoppingCart();

$product1 = new Product(1, "Chocolate Snickers", 2.5);
$item1 = new Item($product1, 3, 10);

$product2 = new Product(2, "Coca Cola", 3.0);
$item2 = new Item($product2, 2, 10);

$product3 = new Product(3, "Pizza", 7.0);
$item3 = new Item($product3, 2, 10);

$product4 = new Product(3, "Repolho", 7.0);
$item4 = new Item($product4, 1, 10);

try {
    $shoppingCart->addItem($item4);
    //$shoppingCart->removeItem($item4);
    $shoppingCart->addItem($item1);
    $shoppingCart->addItem($item2);
    //$shoppingCart->removeItem($item3);
    echo $shoppingCart->getTotal();
} catch (Exception $e) {
    echo "O seguinte erro aconteceu:".PHP_EOL;
    echo $e->getMessage().PHP_EOL;
}

