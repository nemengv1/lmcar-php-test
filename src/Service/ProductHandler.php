<?php

namespace App\Service;

class ProductHandler
{
    public function getTotalPrice($products)
    {
        return array_sum(array_column($products, 'price'));
    }
    public function getDessertTypeAndRsort($products)
    {
        foreach ($products as $key => $value) {
            if ($value['type'] != 'Dessert') {
                unset($products[$key]);
            }
        }
        array_merge($products);
        array_multisort(array_column($products, 'price'), SORT_DESC, $products);
        return $products;
    }
    public function transStrToTime($products)
    {
        $products = array_map(function ($item) {
            $item['create_at'] = strtotime($item['create_at']);
            return $item;
        }, $products);
        return $products;
    }
}
