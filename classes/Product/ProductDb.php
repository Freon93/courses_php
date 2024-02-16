<?php

namespace Classes\Product;

use Exception;

class ProductDb
{
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function save()
    {
    }

    public function update()
    {
    }

    /**
     * @throws Exception
     */
    public function delete(): string
    {
        //delete where id =
        $this->product->get('id');
        return 'OK';
    }
}