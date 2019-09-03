<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRef_LevelRequest;
use App\Http\Requests\UpdateRef_LevelRequest;
use App\Repositories\Ref_LevelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Ref_LevelController extends AppBaseController
{
    /** @var  Ref_LevelRepository */
    private $refLevelRepository;

    public function __construct(Ref_LevelRepository $refLevelRepo)
    {
        $this->refLevelRepository = $refLevelRepo;
    }

    /**
     * Display a listing of the Ref_Level.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $refLevels = $this->refLevelRepository->all();

        return view('ref__levels.index')
            ->with('refLevels', $refLevels);
    }

    /**
     * Show the form for creating a new Ref_Level.
     *
     * @return Response
     */
    public function create()
    {
        return view('ref__levels.create');
    }

    /**
     * Store a newly created Ref_Level in storage.
     *
     * @param CreateRef_LevelRequest $request
     *
     * @return Response
     */
    public function store(CreateRef_LevelRequest $request)
    {
        $input = $request->all();

        $refLevel = $this->refLevelRepository->create($input);

        Flash::success('Ref  Level saved successfully.');

        return redirect(route('refLevels.index'));
    }

    /**
     * Display the specified Ref_Level.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $refLevel = $this->refLevelRepository->find($id);

        if (empty($refLevel)) {
            Flash::error('Ref  Level not found');

            return redirect(route('refLevels.index'));
        }

        return view('ref__levels.show')->with('refLevel', $refLevel);
    }

    /**
     * Show the form for editing the specified Ref_Level.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $refLevel = $this->refLevelRepository->find($id);

        if (empty($refLevel)) {
            Flash::error('Ref  Level not found');

            return redirect(route('refLevels.index'));
        }

        return view('ref__levels.edit')->with('refLevel', $refLevel);
    }

    /**
     * Update the specified Ref_Level in storage.
     *
     * @param int $id
     * @param UpdateRef_LevelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRef_LevelRequest $request)
    {
        $refLevel = $this->refLevelRepository->find($id);

        if (empty($refLevel)) {
            Flash::error('Ref  Level not found');

            return redirect(route('refLevels.index'));
        }

        $refLevel = $this->refLevelRepository->update($request->all(), $id);

        Flash::success('Ref  Level updated successfully.');

        return redirect(route('refLevels.index'));
    }

    /**
     * Remove the specified Ref_Level from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $refLevel = $this->refLevelRepository->find($id);

        if (empty($refLevel)) {
            Flash::error('Ref  Level not found');

            return redirect(route('refLevels.index'));
        }

        $this->refLevelRepository->delete($id);

        Flash::success('Ref  Level deleted successfully.');

        return redirect(route('refLevels.index'));
    }
}
