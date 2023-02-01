<?php

class Product
{
    private int $id;
    private string $description;
    private float $price;

    public function __construct(int $id, string $description, float $price)
    {
        if ($id <= 0) {
            throw new Exception("Não é possivel criar um produto com id negativo");
        }

        $this->id = $id;

        if (empty($description)) {
            throw new Exception("Não é possivel criar um produto com descrição vazia");
        }

        if (strlen($description) <= 3) {
            throw new Exception("Não é possivel criar um produto com descrição menor que 3 caracteres");
        }

        $this->description = $description;

        if ($price <= 0) {
            throw new Exception("Não é possivel criar um produto com preço negativo");
        }

        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}