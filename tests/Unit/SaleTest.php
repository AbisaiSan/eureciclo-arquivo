<?php

namespace Tests\Unit;

use App\Models\Sale;
use PHPUnit\Framework\TestCase;

class SaleTest extends TestCase
{
    /** @test */

    public function test_check_if_sale_columns_is_correct()
    {
        $sale = new Sale;
        $expected = [
            'buyer', 
            'description', 
            'unit_price', 
            'quantity', 
            'address', 
            'supplier'
        ];
        $arrayCompared = array_diff($expected, $sale->getFillable());
        $this->assertEquals(0, count($arrayCompared));
    }
}
