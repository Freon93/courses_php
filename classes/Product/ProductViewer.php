<?php

namespace Classes\Product;

class ProductViewer
{

    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function show()
    {
    }

    public function print(): string
    {
        $productValues = $this->product->getValues();
        return implode(";\n", array_map(fn($key, $value) => $key . '=' . $value, array_keys($productValues), $productValues)) . ";\n";
    }
}