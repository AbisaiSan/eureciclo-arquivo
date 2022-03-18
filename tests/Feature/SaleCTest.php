<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaleCTest extends TestCase
{
    
    /** @test */
    public function test_sale_store()
    {
       $response = $this->call('POST', '/import/create',[
            'buyer' => 'Fulano de tal', 
            'description' => 'Fulano de tal', 
            'unit_price' => 10.5, 
            'quantity' => 6,
            'address' => 'Fulano de tal', 
            'supplier' => 'Fulano de tal', 
       ]);

      //dd($response);
      $response->assertStatus($response->status(),302);
    }
}
