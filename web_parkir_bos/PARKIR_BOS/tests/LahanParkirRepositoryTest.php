<?php

use App\Models\LahanParkir;
use App\Repositories\LahanParkirRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LahanParkirRepositoryTest extends TestCase
{
    use MakeLahanParkirTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LahanParkirRepository
     */
    protected $lahanParkirRepo;

    public function setUp()
    {
        parent::setUp();
        $this->lahanParkirRepo = App::make(LahanParkirRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLahanParkir()
    {
        $lahanParkir = $this->fakeLahanParkirData();
        $createdLahanParkir = $this->lahanParkirRepo->create($lahanParkir);
        $createdLahanParkir = $createdLahanParkir->toArray();
        $this->assertArrayHasKey('id', $createdLahanParkir);
        $this->assertNotNull($createdLahanParkir['id'], 'Created LahanParkir must have id specified');
        $this->assertNotNull(LahanParkir::find($createdLahanParkir['id']), 'LahanParkir with given id must be in DB');
        $this->assertModelData($lahanParkir, $createdLahanParkir);
    }

    /**
     * @test read
     */
    public function testReadLahanParkir()
    {
        $lahanParkir = $this->makeLahanParkir();
        $dbLahanParkir = $this->lahanParkirRepo->find($lahanParkir->id);
        $dbLahanParkir = $dbLahanParkir->toArray();
        $this->assertModelData($lahanParkir->toArray(), $dbLahanParkir);
    }

    /**
     * @test update
     */
    public function testUpdateLahanParkir()
    {
        $lahanParkir = $this->makeLahanParkir();
        $fakeLahanParkir = $this->fakeLahanParkirData();
        $updatedLahanParkir = $this->lahanParkirRepo->update($fakeLahanParkir, $lahanParkir->id);
        $this->assertModelData($fakeLahanParkir, $updatedLahanParkir->toArray());
        $dbLahanParkir = $this->lahanParkirRepo->find($lahanParkir->id);
        $this->assertModelData($fakeLahanParkir, $dbLahanParkir->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLahanParkir()
    {
        $lahanParkir = $this->makeLahanParkir();
        $resp = $this->lahanParkirRepo->delete($lahanParkir->id);
        $this->assertTrue($resp);
        $this->assertNull(LahanParkir::find($lahanParkir->id), 'LahanParkir should not exist in DB');
    }
}
