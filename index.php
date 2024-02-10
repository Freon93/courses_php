<?php
require_once './vendor/autoload.php';

use Classes\Product\Product;
use Classes\Product\ProductDb;
use Classes\Product\ProductViewer;

echo '<pre>';

$product = new Product();

$product->set('quantity', 1);
$product->set('name', 'Toy');

$productViewer = new ProductViewer($product);
echo $productViewer->print();

$productDb = new ProductDb($product);

try {
    echo $productDb->delete();
} catch (Exception $e) {
    echo $e->getMessage();
}

echo '<br>';

$product->set('id', 1);

try {
    echo $productDb->delete();
} catch (Exception $e) {
    echo $e->getMessage();
}