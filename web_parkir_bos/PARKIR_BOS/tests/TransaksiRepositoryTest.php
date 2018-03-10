<?php

use App\Models\Transaksi;
use App\Repositories\TransaksiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransaksiRepositoryTest extends TestCase
{
    use MakeTransaksiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransaksiRepository
     */
    protected $transaksiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->transaksiRepo = App::make(TransaksiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTransaksi()
    {
        $transaksi = $this->fakeTransaksiData();
        $createdTransaksi = $this->transaksiRepo->create($transaksi);
        $createdTransaksi = $createdTransaksi->toArray();
        $this->assertArrayHasKey('id', $createdTransaksi);
        $this->assertNotNull($createdTransaksi['id'], 'Created Transaksi must have id specified');
        $this->assertNotNull(Transaksi::find($createdTransaksi['id']), 'Transaksi with given id must be in DB');
        $this->assertModelData($transaksi, $createdTransaksi);
    }

    /**
     * @test read
     */
    public function testReadTransaksi()
    {
        $transaksi = $this->makeTransaksi();
        $dbTransaksi = $this->transaksiRepo->find($transaksi->id);
        $dbTransaksi = $dbTransaksi->toArray();
        $this->assertModelData($transaksi->toArray(), $dbTransaksi);
    }

    /**
     * @test update
     */
    public function testUpdateTransaksi()
    {
        $transaksi = $this->makeTransaksi();
        $fakeTransaksi = $this->fakeTransaksiData();
        $updatedTransaksi = $this->transaksiRepo->update($fakeTransaksi, $transaksi->id);
        $this->assertModelData($fakeTransaksi, $updatedTransaksi->toArray());
        $dbTransaksi = $this->transaksiRepo->find($transaksi->id);
        $this->assertModelData($fakeTransaksi, $dbTransaksi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTransaksi()
    {
        $transaksi = $this->makeTransaksi();
        $resp = $this->transaksiRepo->delete($transaksi->id);
        $this->assertTrue($resp);
        $this->assertNull(Transaksi::find($transaksi->id), 'Transaksi should not exist in DB');
    }
}
