<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDataKendaraanAPIRequest;
use App\Http\Requests\API\UpdateDataKendaraanAPIRequest;
use App\Models\DataKendaraan;
use App\Repositories\DataKendaraanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DataKendaraanController
 * @package App\Http\Controllers\API
 */

class DataKendaraanAPIController extends AppBaseController
{
    /** @var  DataKendaraanRepository */
    private $dataKendaraanRepository;

    public function __construct(DataKendaraanRepository $dataKendaraanRepo)
    {
        $this->dataKendaraanRepository = $dataKendaraanRepo;
    }

    /**
     * Display a listing of the DataKendaraan.
     * GET|HEAD /dataKendaraans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataKendaraanRepository->pushCriteria(new RequestCriteria($request));
        $this->dataKendaraanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $dataKendaraans = $this->dataKendaraanRepository->all();

        return $this->sendResponse($dataKendaraans->toArray(), 'Data Kendaraans retrieved successfully');
    }

    /**
     * Store a newly created DataKendaraan in storage.
     * POST /dataKendaraans
     *
     * @param CreateDataKendaraanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDataKendaraanAPIRequest $request)
    {
        $input = $request->all();

        $dataKendaraans = $this->dataKendaraanRepository->create($input);

        return $this->sendResponse($dataKendaraans->toArray(), 'Data Kendaraan saved successfully');
    }

    /**
     * Display the specified DataKendaraan.
     * GET|HEAD /dataKendaraans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DataKendaraan $dataKendaraan */
        $dataKendaraan = $this->dataKendaraanRepository->findWithoutFail($id);

        if (empty($dataKendaraan)) {
            return $this->sendError('Data Kendaraan not found');
        }

        return $this->sendResponse($dataKendaraan->toArray(), 'Data Kendaraan retrieved successfully');
    }

    /**
     * Update the specified DataKendaraan in storage.
     * PUT/PATCH /dataKendaraans/{id}
     *
     * @param  int $id
     * @param UpdateDataKendaraanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataKendaraanAPIRequest $request)
    {
        $input = $request->all();

        /** @var DataKendaraan $dataKendaraan */
        $dataKendaraan = $this->dataKendaraanRepository->findWithoutFail($id);

        if (empty($dataKendaraan)) {
            return $this->sendError('Data Kendaraan not found');
        }

        $dataKendaraan = $this->dataKendaraanRepository->update($input, $id);

        return $this->sendResponse($dataKendaraan->toArray(), 'DataKendaraan updated successfully');
    }

    /**
     * Remove the specified DataKendaraan from storage.
     * DELETE /dataKendaraans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DataKendaraan $dataKendaraan */
        $dataKendaraan = $this->dataKendaraanRepository->findWithoutFail($id);

        if (empty($dataKendaraan)) {
            return $this->sendError('Data Kendaraan not found');
        }

        $dataKendaraan->delete();

        return $this->sendResponse($id, 'Data Kendaraan deleted successfully');
    }
}
