<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataKendaraanApiTest extends TestCase
{
    use MakeDataKendaraanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDataKendaraan()
    {
        $dataKendaraan = $this->fakeDataKendaraanData();
        $this->json('POST', '/api/v1/dataKendaraans', $dataKendaraan);

        $this->assertApiResponse($dataKendaraan);
    }

    /**
     * @test
     */
    public function testReadDataKendaraan()
    {
        $dataKendaraan = $this->makeDataKendaraan();
        $this->json('GET', '/api/v1/dataKendaraans/'.$dataKendaraan->id);

        $this->assertApiResponse($dataKendaraan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDataKendaraan()
    {
        $dataKendaraan = $this->makeDataKendaraan();
        $editedDataKendaraan = $this->fakeDataKendaraanData();

        $this->json('PUT', '/api/v1/dataKendaraans/'.$dataKendaraan->id, $editedDataKendaraan);

        $this->assertApiResponse($editedDataKendaraan);
    }

    /**
     * @test
     */
    public function testDeleteDataKendaraan()
    {
        $dataKendaraan = $this->makeDataKendaraan();
        $this->json('DELETE', '/api/v1/dataKendaraans/'.$dataKendaraan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/dataKendaraans/'.$dataKendaraan->id);

        $this->assertResponseStatus(404);
    }
}
