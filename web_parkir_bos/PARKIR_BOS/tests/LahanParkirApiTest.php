<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LahanParkirApiTest extends TestCase
{
    use MakeLahanParkirTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLahanParkir()
    {
        $lahanParkir = $this->fakeLahanParkirData();
        $this->json('POST', '/api/v1/lahanParkirs', $lahanParkir);

        $this->assertApiResponse($lahanParkir);
    }

    /**
     * @test
     */
    public function testReadLahanParkir()
    {
        $lahanParkir = $this->makeLahanParkir();
        $this->json('GET', '/api/v1/lahanParkirs/'.$lahanParkir->id);

        $this->assertApiResponse($lahanParkir->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLahanParkir()
    {
        $lahanParkir = $this->makeLahanParkir();
        $editedLahanParkir = $this->fakeLahanParkirData();

        $this->json('PUT', '/api/v1/lahanParkirs/'.$lahanParkir->id, $editedLahanParkir);

        $this->assertApiResponse($editedLahanParkir);
    }

    /**
     * @test
     */
    public function testDeleteLahanParkir()
    {
        $lahanParkir = $this->makeLahanParkir();
        $this->json('DELETE', '/api/v1/lahanParkirs/'.$lahanParkir->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/lahanParkirs/'.$lahanParkir->id);

        $this->assertResponseStatus(404);
    }
}
