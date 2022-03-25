<?php

namespace App\WebApi\Controllers;

use App\Domain\Entities\Product;
use Laminas\Diactoros\Response\JsonResponse;
use OpenApi\Attributes as OA;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController
{
    const products = [
        ['id' => 1, 'name' => 'Tv', 'price' => 3200],
        ['id' => 2, 'name' => 'Notebook', 'price' => 1800],
    ];

    #[OA\Get(path: '/products', description: 'Products list', summary: 'Products list', tags: ['Products'])]
    #[OA\Response(response: '200', description: 'Products list', content: new OA\MediaType("application/json", schema: new OA\Schema(type: 'array', items: new OA\Items(type: Product::class))))]
    public function list(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse(self::products);
    }

    #[OA\Get(path: '/product/{id}', description: 'Return product by ID', summary: 'Return product by ID', tags: ['Products'])]
    #[OA\Parameter(name: "id", in: "path", required: true)]
    #[OA\Response(response: '200', description: 'Product', content: new OA\MediaType("application/json", schema: new OA\Schema(type: Product::class)))]
    public function findById(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse(self::products[0]);
    }
}