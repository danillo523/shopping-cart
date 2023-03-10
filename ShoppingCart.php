<?php

require_once "Product.php";
require_once "Item.php";

class ShoppingCart
{
    private array $items = [];

    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    public function removeItem(Item $item): void
    {
        $currentItem = array_search($item, $this->items);

        if ($currentItem === false) {
            throw new Exception("Não é possível remover um item que não está no carrinho");
        }

        unset($this->items[$currentItem]);
    }

    public function listItems(): array
    {
        return $this->items;
    }

    public function numberOfItems(): int
    {
        return count($this->items);
    }

    public function getTotal(): float
    {
        return array_reduce($this->items, [$this, 'sumItems'], 0);
    }

    private function sumItems(float $previous, Item $item): float
    {
        return $previous + $item->getTotal();
    }
}
