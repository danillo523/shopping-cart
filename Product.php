<?php

class Product
{
    private int $id;
    private string $description;
    private float $price;

    public function __construct(int $id, string $description, float $price)
    {
        $this->ensureIdIsValid($id);
        $this->ensureDescriptionIsValid($description);
        $this->ensurePriceIsValid($id);
        $this->id = $id;
        $this->description = $description;
        $this->price = $price;
    }

    private function ensureIdIsValid(int $id)
    {
        if ($id <= 0) {
            throw new Exception("Não é possível criar um produto com id menor que 0.");
        }
    }

    private function ensureDescriptionIsValid(String $description)
    {
        if (strlen($description) < 3) {
            throw new Exception("Não é possível criar um produto sem descrição ou com menos de 3 letras.");
        }
    }

    private function ensurePriceIsValid(float $price)
    {
        if ($price <= 0) {
            throw new Exception("Não é possível criar um produto sem preço.");
        }
    }

    public function price(): float
    {
        return $this->price;
    }
}