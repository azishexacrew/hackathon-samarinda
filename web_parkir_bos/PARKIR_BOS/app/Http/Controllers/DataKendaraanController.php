<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataKendaraanRequest;
use App\Http\Requests\UpdateDataKendaraanRequest;
use App\Repositories\DataKendaraanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DataKendaraanController extends AppBaseController
{
    /** @var  DataKendaraanRepository */
    private $dataKendaraanRepository;

    public function __construct(DataKendaraanRepository $dataKendaraanRepo)
    {
        $this->dataKendaraanRepository = $dataKendaraanRepo;
    }

    /**
     * Display a listing of the DataKendaraan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataKendaraanRepository->pushCriteria(new RequestCriteria($request));
        $dataKendaraans = $this->dataKendaraanRepository->all();

        return view('data_kendaraans.index')
            ->with('dataKendaraans', $dataKendaraans);
    }

    /**
     * Show the form for creating a new DataKendaraan.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_kendaraans.create');
    }

    /**
     * Store a newly created DataKendaraan in storage.
     *
     * @param CreateDataKendaraanRequest $request
     *
     * @return Response
     */
    public function store(CreateDataKendaraanRequest $request)
    {
        $input = $request->all();

        $dataKendaraan = $this->dataKendaraanRepository->create($input);

        Flash::success('Data Kendaraan saved successfully.');

        return redirect(route('dataKendaraans.index'));
    }

    /**
     * Display the specified DataKendaraan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataKendaraan = $this->dataKendaraanRepository->findWithoutFail($id);

        if (empty($dataKendaraan)) {
            Flash::error('Data Kendaraan not found');

            return redirect(route('dataKendaraans.index'));
        }

        return view('data_kendaraans.show')->with('dataKendaraan', $dataKendaraan);
    }

    /**
     * Show the form for editing the specified DataKendaraan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataKendaraan = $this->dataKendaraanRepository->findWithoutFail($id);

        if (empty($dataKendaraan)) {
            Flash::error('Data Kendaraan not found');

            return redirect(route('dataKendaraans.index'));
        }

        return view('data_kendaraans.edit')->with('dataKendaraan', $dataKendaraan);
    }

    /**
     * Update the specified DataKendaraan in storage.
     *
     * @param  int              $id
     * @param UpdateDataKendaraanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataKendaraanRequest $request)
    {
        $dataKendaraan = $this->dataKendaraanRepository->findWithoutFail($id);

        if (empty($dataKendaraan)) {
            Flash::error('Data Kendaraan not found');

            return redirect(route('dataKendaraans.index'));
        }

        $dataKendaraan = $this->dataKendaraanRepository->update($request->all(), $id);

        Flash::success('Data Kendaraan updated successfully.');

        return redirect(route('dataKendaraans.index'));
    }

    /**
     * Remove the specified DataKendaraan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataKendaraan = $this->dataKendaraanRepository->findWithoutFail($id);

        if (empty($dataKendaraan)) {
            Flash::error('Data Kendaraan not found');

            return redirect(route('dataKendaraans.index'));
        }

        $this->dataKendaraanRepository->delete($id);

        Flash::success('Data Kendaraan deleted successfully.');

        return redirect(route('dataKendaraans.index'));
    }
}
