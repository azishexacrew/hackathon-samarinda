<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJenisKendaraanAPIRequest;
use App\Http\Requests\API\UpdateJenisKendaraanAPIRequest;
use App\Models\JenisKendaraan;
use App\Repositories\JenisKendaraanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JenisKendaraanController
 * @package App\Http\Controllers\API
 */

class JenisKendaraanAPIController extends AppBaseController
{
    /** @var  JenisKendaraanRepository */
    private $jenisKendaraanRepository;

    public function __construct(JenisKendaraanRepository $jenisKendaraanRepo)
    {
        $this->jenisKendaraanRepository = $jenisKendaraanRepo;
    }

    /**
     * Display a listing of the JenisKendaraan.
     * GET|HEAD /jenisKendaraans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jenisKendaraanRepository->pushCriteria(new RequestCriteria($request));
        $this->jenisKendaraanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jenisKendaraans = $this->jenisKendaraanRepository->all();

        return $this->sendResponse($jenisKendaraans->toArray(), 'Jenis Kendaraans retrieved successfully');
    }

    /**
     * Store a newly created JenisKendaraan in storage.
     * POST /jenisKendaraans
     *
     * @param CreateJenisKendaraanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisKendaraanAPIRequest $request)
    {
        $input = $request->all();

        $jenisKendaraans = $this->jenisKendaraanRepository->create($input);

        return $this->sendResponse($jenisKendaraans->toArray(), 'Jenis Kendaraan saved successfully');
    }

    /**
     * Display the specified JenisKendaraan.
     * GET|HEAD /jenisKendaraans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var JenisKendaraan $jenisKendaraan */
        $jenisKendaraan = $this->jenisKendaraanRepository->findWithoutFail($id);

        if (empty($jenisKendaraan)) {
            return $this->sendError('Jenis Kendaraan not found');
        }

        return $this->sendResponse($jenisKendaraan->toArray(), 'Jenis Kendaraan retrieved successfully');
    }

    /**
     * Update the specified JenisKendaraan in storage.
     * PUT/PATCH /jenisKendaraans/{id}
     *
     * @param  int $id
     * @param UpdateJenisKendaraanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisKendaraanAPIRequest $request)
    {
        $input = $request->all();

        /** @var JenisKendaraan $jenisKendaraan */
        $jenisKendaraan = $this->jenisKendaraanRepository->findWithoutFail($id);

        if (empty($jenisKendaraan)) {
            return $this->sendError('Jenis Kendaraan not found');
        }

        $jenisKendaraan = $this->jenisKendaraanRepository->update($input, $id);

        return $this->sendResponse($jenisKendaraan->toArray(), 'JenisKendaraan updated successfully');
    }

    /**
     * Remove the specified JenisKendaraan from storage.
     * DELETE /jenisKendaraans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var JenisKendaraan $jenisKendaraan */
        $jenisKendaraan = $this->jenisKendaraanRepository->findWithoutFail($id);

        if (empty($jenisKendaraan)) {
            return $this->sendError('Jenis Kendaraan not found');
        }

        $jenisKendaraan->delete();

        return $this->sendResponse($id, 'Jenis Kendaraan deleted successfully');
    }
}
