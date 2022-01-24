<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CurrencyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * A test for latest currency list
     *
     * @return void
     */
    public function test_latset_currency_list()
    {
        $response = $this->get('/api/latest/usd');
        $response->assertStatus(200);
    }

    /**
     * A test for converting currency
     *
     * @return void
     */
    public function test_currencies_converter_for_invalid_currency()
    {
        $response = $this->post('/api/convert', ['from'=>'usd','to'=>'eur1','amount'=>10]);
        $response->assertStatus(422);
    }

     /**
     * A test for converting currency
     *
     * @return void
     */
    public function test_currencies_converter_for_invlaid_amount()
    {
        $response = $this->post('/api/convert', ['from'=>'usd','to'=>'eur','amount'=>'---']);
        $response->assertStatus(422);
    }

}