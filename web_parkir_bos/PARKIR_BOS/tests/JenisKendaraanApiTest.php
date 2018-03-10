<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JenisKendaraanApiTest extends TestCase
{
    use MakeJenisKendaraanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateJenisKendaraan()
    {
        $jenisKendaraan = $this->fakeJenisKendaraanData();
        $this->json('POST', '/api/v1/jenisKendaraans', $jenisKendaraan);

        $this->assertApiResponse($jenisKendaraan);
    }

    /**
     * @test
     */
    public function testReadJenisKendaraan()
    {
        $jenisKendaraan = $this->makeJenisKendaraan();
        $this->json('GET', '/api/v1/jenisKendaraans/'.$jenisKendaraan->id);

        $this->assertApiResponse($jenisKendaraan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateJenisKendaraan()
    {
        $jenisKendaraan = $this->makeJenisKendaraan();
        $editedJenisKendaraan = $this->fakeJenisKendaraanData();

        $this->json('PUT', '/api/v1/jenisKendaraans/'.$jenisKendaraan->id, $editedJenisKendaraan);

        $this->assertApiResponse($editedJenisKendaraan);
    }

    /**
     * @test
     */
    public function testDeleteJenisKendaraan()
    {
        $jenisKendaraan = $this->makeJenisKendaraan();
        $this->json('DELETE', '/api/v1/jenisKendaraans/'.$jenisKendaraan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/jenisKendaraans/'.$jenisKendaraan->id);

        $this->assertResponseStatus(404);
    }
}
