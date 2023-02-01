<?php

class Product
{
    private int $id;
    private string $description;
    private float $price;

    public function __construct(int $id, string $description, float $price)
    {
        if ($id <= 0) {
            throw new Exception("Não é possível criar um produto com id negativo ou igual a 0");
        }

        $this->id = $id;

        if (empty($description)) {
            throw new Exception("Não é possível criar um produto com descrição vazia");
        }

        if (strlen($description) <= 3) {
            throw new Exception("Não é possível criar um produto com descrição menor ou igual a 3 caracteres");
        }

        $this->description = $description;

        if ($price <= 0) {
            throw new Exception("Não é possivel criar um produto com preço menor ou igual a 0");
        }

        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}