<?php

declare(strict_types=1);

namespace Model\Repository;

use Model\Entity;
use IdentityMap;

class Product
{
    private $identityMap;

    public function __construct()
    {
        $this->identityMap = new IdentityMap();
    }

    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }

        $productList = [];
        foreach ($this->getDataFromSource(['id' => $ids]) as $item) {
            $product = $this->identityMap->get($item['id']);

            if (!$product) {
                $product = new Entity\Product($item['id'], $item['name'], $item['price']);
                $this->identityMap->add($product);
            }

            $productList[] = $product;
        }

        return $productList;
    }

    public function fetchAll(): array
    {
        $productList = [];
        foreach ($this->getDataFromSource() as $item) {
            $product = $this->identityMap->get($item['id']);

            if (!$product) {
                $product = new Entity\Product($item['id'], $item['name'], $item['price']);
                $this->identityMap->add($product);
            }

            $productList[] = $product;
        }

        return $productList;
    }

    private function getDataFromSource(array $search = [])
    {
        $dataSource = [
            [
                'id' => 1,
                'name' => 'PHP',
                'price' => 15300,
            ],
            [
                'id' => 2,
                'name' => 'Python',
                'price' => 20400,
            ],
            [
                'id' => 3,
                'name' => 'C#',
                'price' => 30100,
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return in_array($dataSource[key($search)], current($search), true);
        };

        return array_filter($dataSource, $productFilter);
    }
}
