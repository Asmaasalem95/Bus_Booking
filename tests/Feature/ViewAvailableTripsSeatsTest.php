<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewAvailableTripsSeatsTest extends TestCase
{


    public function getAvailableTrips($params)
    {
        return   $this->json('POST', "api/available_seats",$params);
    }

    /**
     * @test
     */
    function from_is_required_to_view_Available_seats()
    {
        $response =   $this->getAvailableTrips([
            'to' => 'Asyut',
        ]);
        //Assert
        $response->assertStatus(422);
    }

    /**
     * @test
     */
    function to_is_required_to_view_Available_seats()
    {
        $response =   $this->getAvailableTrips([
            'from' => 'Cairo',
        ]);
        //Assert
        $response->assertStatus(422);
    }
}
