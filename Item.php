<?php

require_once "Product.php";

class Item
{
    private Product $product;
    private int $quantity;
    private float $discount;

    public function __construct(Product $product, int $quantity, float $discount = 0)
    {
        $this->product = $product;

        if ($quantity <= 0) {
            throw new Exception("Não é possível criar um item com quantidade zero ou negativo");
        }

        $this->quantity = $quantity;

        if ($discount > 100) {
            throw new Exception("Não é possível criar um item com desconto maior que 100%");
        }

        if ($discount < 0) {
            throw new Exception("Não é possível criar um produto com desconto negativo");
        }

        if ($discount !== 0) {
            $this->discount = ($this->product->getPrice() * ($discount / 100));
        } else {
            $this->discount = $discount;
        }
    }

    public function getTotalWithDiscount(): float
    {
        return ($this->product->getPrice() - $this->discount) * $this->quantity;
    }
}