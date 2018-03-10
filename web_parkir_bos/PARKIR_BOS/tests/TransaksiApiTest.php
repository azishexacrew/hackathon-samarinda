<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransaksiApiTest extends TestCase
{
    use MakeTransaksiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTransaksi()
    {
        $transaksi = $this->fakeTransaksiData();
        $this->json('POST', '/api/v1/transaksis', $transaksi);

        $this->assertApiResponse($transaksi);
    }

    /**
     * @test
     */
    public function testReadTransaksi()
    {
        $transaksi = $this->makeTransaksi();
        $this->json('GET', '/api/v1/transaksis/'.$transaksi->id);

        $this->assertApiResponse($transaksi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTransaksi()
    {
        $transaksi = $this->makeTransaksi();
        $editedTransaksi = $this->fakeTransaksiData();

        $this->json('PUT', '/api/v1/transaksis/'.$transaksi->id, $editedTransaksi);

        $this->assertApiResponse($editedTransaksi);
    }

    /**
     * @test
     */
    public function testDeleteTransaksi()
    {
        $transaksi = $this->makeTransaksi();
        $this->json('DELETE', '/api/v1/transaksis/'.$transaksi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/transaksis/'.$transaksi->id);

        $this->assertResponseStatus(404);
    }
}
