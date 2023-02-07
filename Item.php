<?php

require_once "Product.php";

class Item
{
    private Product $product;
    private int $quantity;
    private float $discount;

    public function __construct(Product $product, int $quantity, float $discount = 0)
    {
        $this->ensureQuantityIsValid($quantity);
        $this->ensureDiscountIsValid($discount);
        $this->product = $product;
        $this->quantity = $quantity;
        $this->discount = $discount;
    }

    private function ensureQuantityIsValid(float $quantity)
    {
        if ($quantity <= 0) {
            throw new Exception("Não é possível criar um item com quantidade zero ou negativo.");
        }
    }

    private function ensureDiscountIsValid(float $discount)
    {
        if ($discount < 0 || $discount > 100) {
            throw new Exception("O item só pode ter desconto entre 0% a 100%.");
        }
    }

    public function getTotal(): float
    {
        $totalWithDiscount = $this->product->price() * $this->quantity;
        $discount = $this->discount / 100;
        $discountPrice = $totalWithDiscount * $discount;

        return $totalWithDiscount - $discountPrice;
    }
}