<?php

use App\Models\DataKendaraan;
use App\Repositories\DataKendaraanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataKendaraanRepositoryTest extends TestCase
{
    use MakeDataKendaraanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DataKendaraanRepository
     */
    protected $dataKendaraanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->dataKendaraanRepo = App::make(DataKendaraanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDataKendaraan()
    {
        $dataKendaraan = $this->fakeDataKendaraanData();
        $createdDataKendaraan = $this->dataKendaraanRepo->create($dataKendaraan);
        $createdDataKendaraan = $createdDataKendaraan->toArray();
        $this->assertArrayHasKey('id', $createdDataKendaraan);
        $this->assertNotNull($createdDataKendaraan['id'], 'Created DataKendaraan must have id specified');
        $this->assertNotNull(DataKendaraan::find($createdDataKendaraan['id']), 'DataKendaraan with given id must be in DB');
        $this->assertModelData($dataKendaraan, $createdDataKendaraan);
    }

    /**
     * @test read
     */
    public function testReadDataKendaraan()
    {
        $dataKendaraan = $this->makeDataKendaraan();
        $dbDataKendaraan = $this->dataKendaraanRepo->find($dataKendaraan->id);
        $dbDataKendaraan = $dbDataKendaraan->toArray();
        $this->assertModelData($dataKendaraan->toArray(), $dbDataKendaraan);
    }

    /**
     * @test update
     */
    public function testUpdateDataKendaraan()
    {
        $dataKendaraan = $this->makeDataKendaraan();
        $fakeDataKendaraan = $this->fakeDataKendaraanData();
        $updatedDataKendaraan = $this->dataKendaraanRepo->update($fakeDataKendaraan, $dataKendaraan->id);
        $this->assertModelData($fakeDataKendaraan, $updatedDataKendaraan->toArray());
        $dbDataKendaraan = $this->dataKendaraanRepo->find($dataKendaraan->id);
        $this->assertModelData($fakeDataKendaraan, $dbDataKendaraan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDataKendaraan()
    {
        $dataKendaraan = $this->makeDataKendaraan();
        $resp = $this->dataKendaraanRepo->delete($dataKendaraan->id);
        $this->assertTrue($resp);
        $this->assertNull(DataKendaraan::find($dataKendaraan->id), 'DataKendaraan should not exist in DB');
    }
}
