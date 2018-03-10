<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJenisKendaraanRequest;
use App\Http\Requests\UpdateJenisKendaraanRequest;
use App\Repositories\JenisKendaraanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class JenisKendaraanController extends AppBaseController
{
    /** @var  JenisKendaraanRepository */
    private $jenisKendaraanRepository;

    public function __construct(JenisKendaraanRepository $jenisKendaraanRepo)
    {
        $this->jenisKendaraanRepository = $jenisKendaraanRepo;
    }

    /**
     * Display a listing of the JenisKendaraan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jenisKendaraanRepository->pushCriteria(new RequestCriteria($request));
        $jenisKendaraans = $this->jenisKendaraanRepository->all();

        return view('jenis_kendaraans.index')
            ->with('jenisKendaraans', $jenisKendaraans);
    }

    /**
     * Show the form for creating a new JenisKendaraan.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis_kendaraans.create');
    }

    /**
     * Store a newly created JenisKendaraan in storage.
     *
     * @param CreateJenisKendaraanRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisKendaraanRequest $request)
    {
        $input = $request->all();

        $jenisKendaraan = $this->jenisKendaraanRepository->create($input);

        Flash::success('Jenis Kendaraan saved successfully.');

        return redirect(route('jenisKendaraans.index'));
    }

    /**
     * Display the specified JenisKendaraan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisKendaraan = $this->jenisKendaraanRepository->findWithoutFail($id);

        if (empty($jenisKendaraan)) {
            Flash::error('Jenis Kendaraan not found');

            return redirect(route('jenisKendaraans.index'));
        }

        return view('jenis_kendaraans.show')->with('jenisKendaraan', $jenisKendaraan);
    }

    /**
     * Show the form for editing the specified JenisKendaraan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisKendaraan = $this->jenisKendaraanRepository->findWithoutFail($id);

        if (empty($jenisKendaraan)) {
            Flash::error('Jenis Kendaraan not found');

            return redirect(route('jenisKendaraans.index'));
        }

        return view('jenis_kendaraans.edit')->with('jenisKendaraan', $jenisKendaraan);
    }

    /**
     * Update the specified JenisKendaraan in storage.
     *
     * @param  int              $id
     * @param UpdateJenisKendaraanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisKendaraanRequest $request)
    {
        $jenisKendaraan = $this->jenisKendaraanRepository->findWithoutFail($id);

        if (empty($jenisKendaraan)) {
            Flash::error('Jenis Kendaraan not found');

            return redirect(route('jenisKendaraans.index'));
        }

        $jenisKendaraan = $this->jenisKendaraanRepository->update($request->all(), $id);

        Flash::success('Jenis Kendaraan updated successfully.');

        return redirect(route('jenisKendaraans.index'));
    }

    /**
     * Remove the specified JenisKendaraan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisKendaraan = $this->jenisKendaraanRepository->findWithoutFail($id);

        if (empty($jenisKendaraan)) {
            Flash::error('Jenis Kendaraan not found');

            return redirect(route('jenisKendaraans.index'));
        }

        $this->jenisKendaraanRepository->delete($id);

        Flash::success('Jenis Kendaraan deleted successfully.');

        return redirect(route('jenisKendaraans.index'));
    }
}
