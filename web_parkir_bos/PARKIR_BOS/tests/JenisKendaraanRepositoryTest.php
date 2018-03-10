<?php

use App\Models\JenisKendaraan;
use App\Repositories\JenisKendaraanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JenisKendaraanRepositoryTest extends TestCase
{
    use MakeJenisKendaraanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var JenisKendaraanRepository
     */
    protected $jenisKendaraanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->jenisKendaraanRepo = App::make(JenisKendaraanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateJenisKendaraan()
    {
        $jenisKendaraan = $this->fakeJenisKendaraanData();
        $createdJenisKendaraan = $this->jenisKendaraanRepo->create($jenisKendaraan);
        $createdJenisKendaraan = $createdJenisKendaraan->toArray();
        $this->assertArrayHasKey('id', $createdJenisKendaraan);
        $this->assertNotNull($createdJenisKendaraan['id'], 'Created JenisKendaraan must have id specified');
        $this->assertNotNull(JenisKendaraan::find($createdJenisKendaraan['id']), 'JenisKendaraan with given id must be in DB');
        $this->assertModelData($jenisKendaraan, $createdJenisKendaraan);
    }

    /**
     * @test read
     */
    public function testReadJenisKendaraan()
    {
        $jenisKendaraan = $this->makeJenisKendaraan();
        $dbJenisKendaraan = $this->jenisKendaraanRepo->find($jenisKendaraan->id);
        $dbJenisKendaraan = $dbJenisKendaraan->toArray();
        $this->assertModelData($jenisKendaraan->toArray(), $dbJenisKendaraan);
    }

    /**
     * @test update
     */
    public function testUpdateJenisKendaraan()
    {
        $jenisKendaraan = $this->makeJenisKendaraan();
        $fakeJenisKendaraan = $this->fakeJenisKendaraanData();
        $updatedJenisKendaraan = $this->jenisKendaraanRepo->update($fakeJenisKendaraan, $jenisKendaraan->id);
        $this->assertModelData($fakeJenisKendaraan, $updatedJenisKendaraan->toArray());
        $dbJenisKendaraan = $this->jenisKendaraanRepo->find($jenisKendaraan->id);
        $this->assertModelData($fakeJenisKendaraan, $dbJenisKendaraan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteJenisKendaraan()
    {
        $jenisKendaraan = $this->makeJenisKendaraan();
        $resp = $this->jenisKendaraanRepo->delete($jenisKendaraan->id);
        $this->assertTrue($resp);
        $this->assertNull(JenisKendaraan::find($jenisKendaraan->id), 'JenisKendaraan should not exist in DB');
    }
}
