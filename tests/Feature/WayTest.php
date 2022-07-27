<?php

namespace Tests\Feature;

use App\Models\Way;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WayTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_way_can_be_created()
    {
        $way = Way::factory()->create();
        $expect = [
            'user_id' => 1,
            'url'=>'https://www.google.com',

        ];
        
        $this->assertEquals($expect,$way);
        
    }
}
