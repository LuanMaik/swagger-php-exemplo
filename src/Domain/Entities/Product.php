<?php

namespace App\Domain\Entities;

use OpenApi\Attributes as OA;

#[OA\Schema]
class Product
{
    #[OA\Property(example: 1)]
    private int $id;

    #[OA\Property(example: 'Notebook')]
    private string $name;

    #[OA\Property(example: 1500.99)]
    private float $price;

    /**
     * @param int $id
     * @param string $name
     * @param float $price
     */
    public function __construct(int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

}