<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransaksiAPIRequest;
use App\Http\Requests\API\UpdateTransaksiAPIRequest;
use App\Models\Transaksi;
use App\Repositories\TransaksiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TransaksiController
 * @package App\Http\Controllers\API
 */

class TransaksiAPIController extends AppBaseController
{
    /** @var  TransaksiRepository */
    private $transaksiRepository;

    public function __construct(TransaksiRepository $transaksiRepo)
    {
        $this->transaksiRepository = $transaksiRepo;
    }

    /**
     * Display a listing of the Transaksi.
     * GET|HEAD /transaksis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transaksiRepository->pushCriteria(new RequestCriteria($request));
        $this->transaksiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transaksis = $this->transaksiRepository->all();

        return $this->sendResponse($transaksis->toArray(), 'Transaksis retrieved successfully');
    }

    /**
     * Store a newly created Transaksi in storage.
     * POST /transaksis
     *
     * @param CreateTransaksiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransaksiAPIRequest $request)
    {
        $input = $request->all();

        $transaksis = $this->transaksiRepository->create($input);

        return $this->sendResponse($transaksis->toArray(), 'Transaksi saved successfully');
    }

    /**
     * Display the specified Transaksi.
     * GET|HEAD /transaksis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Transaksi $transaksi */
        $transaksi = $this->transaksiRepository->findWithoutFail($id);

        if (empty($transaksi)) {
            return $this->sendError('Transaksi not found');
        }

        return $this->sendResponse($transaksi->toArray(), 'Transaksi retrieved successfully');
    }

    /**
     * Update the specified Transaksi in storage.
     * PUT/PATCH /transaksis/{id}
     *
     * @param  int $id
     * @param UpdateTransaksiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransaksiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Transaksi $transaksi */
        $transaksi = $this->transaksiRepository->findWithoutFail($id);

        if (empty($transaksi)) {
            return $this->sendError('Transaksi not found');
        }

        $transaksi = $this->transaksiRepository->update($input, $id);

        return $this->sendResponse($transaksi->toArray(), 'Transaksi updated successfully');
    }

    /**
     * Remove the specified Transaksi from storage.
     * DELETE /transaksis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Transaksi $transaksi */
        $transaksi = $this->transaksiRepository->findWithoutFail($id);

        if (empty($transaksi)) {
            return $this->sendError('Transaksi not found');
        }

        $transaksi->delete();

        return $this->sendResponse($id, 'Transaksi deleted successfully');
    }
}
