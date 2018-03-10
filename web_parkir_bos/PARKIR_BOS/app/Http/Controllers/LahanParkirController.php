<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLahanParkirRequest;
use App\Http\Requests\UpdateLahanParkirRequest;
use App\Repositories\LahanParkirRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LahanParkirController extends AppBaseController
{
    /** @var  LahanParkirRepository */
    private $lahanParkirRepository;

    public function __construct(LahanParkirRepository $lahanParkirRepo)
    {
        $this->lahanParkirRepository = $lahanParkirRepo;
    }

    /**
     * Display a listing of the LahanParkir.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lahanParkirRepository->pushCriteria(new RequestCriteria($request));
        $lahanParkirs = $this->lahanParkirRepository->all();

        return view('lahan_parkirs.index')
            ->with('lahanParkirs', $lahanParkirs);
    }

    /**
     * Show the form for creating a new LahanParkir.
     *
     * @return Response
     */
    public function create()
    {
        return view('lahan_parkirs.create');
    }

    /**
     * Store a newly created LahanParkir in storage.
     *
     * @param CreateLahanParkirRequest $request
     *
     * @return Response
     */
    public function store(CreateLahanParkirRequest $request)
    {
        $input = $request->all();

        $lahanParkir = $this->lahanParkirRepository->create($input);

        Flash::success('Lahan Parkir saved successfully.');

        return redirect(route('lahanParkirs.index'));
    }

    /**
     * Display the specified LahanParkir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lahanParkir = $this->lahanParkirRepository->findWithoutFail($id);

        if (empty($lahanParkir)) {
            Flash::error('Lahan Parkir not found');

            return redirect(route('lahanParkirs.index'));
        }

        return view('lahan_parkirs.show')->with('lahanParkir', $lahanParkir);
    }

    /**
     * Show the form for editing the specified LahanParkir.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lahanParkir = $this->lahanParkirRepository->findWithoutFail($id);

        if (empty($lahanParkir)) {
            Flash::error('Lahan Parkir not found');

            return redirect(route('lahanParkirs.index'));
        }

        return view('lahan_parkirs.edit')->with('lahanParkir', $lahanParkir);
    }

    /**
     * Update the specified LahanParkir in storage.
     *
     * @param  int              $id
     * @param UpdateLahanParkirRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLahanParkirRequest $request)
    {
        $lahanParkir = $this->lahanParkirRepository->findWithoutFail($id);

        if (empty($lahanParkir)) {
            Flash::error('Lahan Parkir not found');

            return redirect(route('lahanParkirs.index'));
        }

        $lahanParkir = $this->lahanParkirRepository->update($request->all(), $id);

        Flash::success('Lahan Parkir updated successfully.');

        return redirect(route('lahanParkirs.index'));
    }

    /**
     * Remove the specified LahanParkir from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lahanParkir = $this->lahanParkirRepository->findWithoutFail($id);

        if (empty($lahanParkir)) {
            Flash::error('Lahan Parkir not found');

            return redirect(route('lahanParkirs.index'));
        }

        $this->lahanParkirRepository->delete($id);

        Flash::success('Lahan Parkir deleted successfully.');

        return redirect(route('lahanParkirs.index'));
    }
}
