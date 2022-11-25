<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\ProductHandler;

/**
 * Class ProductHandlerTest
 */
class ProductHandlerTest extends TestCase
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    public function testGetTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }

        $this->assertEquals(143, $totalPrice);
    }
    public function testNewGetTotalPrice()
    {
        $this->assertEquals(143, (new ProductHandler)->getTotalPrice($this->products));
    }
    public function testNewGetDessertTypeAndRsort()
    {
        $list = (new ProductHandler)->getDessertTypeAndRsort($this->products);
        $this->assertEquals(2, count($list));
        $this->assertEquals(5, $list[0]['id']);
        $this->assertEquals(4, $list[1]['id']);
    }
    public function testNewTransStrToTime()
    {
        $list = (new ProductHandler)->transStrToTime($this->products);
        $this->assertEquals(6, count($list));
        $this->assertEquals(1618884000, $list[0]['create_at']);
        $this->assertEquals(1618966800, $list[1]['create_at']);
        $this->assertEquals(1618916400, $list[2]['create_at']);
        $this->assertEquals(1618706700, $list[3]['create_at']);
        $this->assertEquals(1618814280, $list[4]['create_at']);
        $this->assertEquals(1617535380, $list[5]['create_at']);
    }
}
