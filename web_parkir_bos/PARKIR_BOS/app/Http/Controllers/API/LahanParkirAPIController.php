<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLahanParkirAPIRequest;
use App\Http\Requests\API\UpdateLahanParkirAPIRequest;
use App\Models\LahanParkir;
use App\Repositories\LahanParkirRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LahanParkirController
 * @package App\Http\Controllers\API
 */

class LahanParkirAPIController extends AppBaseController
{
    /** @var  LahanParkirRepository */
    private $lahanParkirRepository;

    public function __construct(LahanParkirRepository $lahanParkirRepo)
    {
        $this->lahanParkirRepository = $lahanParkirRepo;
    }

    /**
     * Display a listing of the LahanParkir.
     * GET|HEAD /lahanParkirs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lahanParkirRepository->pushCriteria(new RequestCriteria($request));
        $this->lahanParkirRepository->pushCriteria(new LimitOffsetCriteria($request));
        $lahanParkirs = $this->lahanParkirRepository->all();

        return $this->sendResponse($lahanParkirs->toArray(), 'Lahan Parkirs retrieved successfully');
    }

    /**
     * Store a newly created LahanParkir in storage.
     * POST /lahanParkirs
     *
     * @param CreateLahanParkirAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLahanParkirAPIRequest $request)
    {
        $input = $request->all();

        $lahanParkirs = $this->lahanParkirRepository->create($input);

        return $this->sendResponse($lahanParkirs->toArray(), 'Lahan Parkir saved successfully');
    }

    /**
     * Display the specified LahanParkir.
     * GET|HEAD /lahanParkirs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LahanParkir $lahanParkir */
        $lahanParkir = $this->lahanParkirRepository->findWithoutFail($id);

        if (empty($lahanParkir)) {
            return $this->sendError('Lahan Parkir not found');
        }

        return $this->sendResponse($lahanParkir->toArray(), 'Lahan Parkir retrieved successfully');
    }

    /**
     * Update the specified LahanParkir in storage.
     * PUT/PATCH /lahanParkirs/{id}
     *
     * @param  int $id
     * @param UpdateLahanParkirAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLahanParkirAPIRequest $request)
    {
        $input = $request->all();

        /** @var LahanParkir $lahanParkir */
        $lahanParkir = $this->lahanParkirRepository->findWithoutFail($id);

        if (empty($lahanParkir)) {
            return $this->sendError('Lahan Parkir not found');
        }

        $lahanParkir = $this->lahanParkirRepository->update($input, $id);

        return $this->sendResponse($lahanParkir->toArray(), 'LahanParkir updated successfully');
    }

    /**
     * Remove the specified LahanParkir from storage.
     * DELETE /lahanParkirs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LahanParkir $lahanParkir */
        $lahanParkir = $this->lahanParkirRepository->findWithoutFail($id);

        if (empty($lahanParkir)) {
            return $this->sendError('Lahan Parkir not found');
        }

        $lahanParkir->delete();

        return $this->sendResponse($id, 'Lahan Parkir deleted successfully');
    }
}
