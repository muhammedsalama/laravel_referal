<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRef_CategoryRequest;
use App\Http\Requests\UpdateRef_CategoryRequest;
use App\Repositories\Ref_CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Ref_CategoryController extends AppBaseController
{
    /** @var  Ref_CategoryRepository */
    private $refCategoryRepository;

    public function __construct(Ref_CategoryRepository $refCategoryRepo)
    {
        $this->refCategoryRepository = $refCategoryRepo;
    }

    /**
     * Display a listing of the Ref_Category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $refCategories = $this->refCategoryRepository->all();

        return view('ref__categories.index')
            ->with('refCategories', $refCategories);
    }

    /**
     * Show the form for creating a new Ref_Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('ref__categories.create');
    }

    /**
     * Store a newly created Ref_Category in storage.
     *
     * @param CreateRef_CategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateRef_CategoryRequest $request)
    {
        $input = $request->all();

        $refCategory = $this->refCategoryRepository->create($input);

        Flash::success('Ref  Category saved successfully.');

        return redirect(route('refCategories.index'));
    }

    /**
     * Display the specified Ref_Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $refCategory = $this->refCategoryRepository->find($id);

        if (empty($refCategory)) {
            Flash::error('Ref  Category not found');

            return redirect(route('refCategories.index'));
        }

        return view('ref__categories.show')->with('refCategory', $refCategory);
    }

    /**
     * Show the form for editing the specified Ref_Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $refCategory = $this->refCategoryRepository->find($id);

        if (empty($refCategory)) {
            Flash::error('Ref  Category not found');

            return redirect(route('refCategories.index'));
        }

        return view('ref__categories.edit')->with('refCategory', $refCategory);
    }

    /**
     * Update the specified Ref_Category in storage.
     *
     * @param int $id
     * @param UpdateRef_CategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRef_CategoryRequest $request)
    {
        $refCategory = $this->refCategoryRepository->find($id);

        if (empty($refCategory)) {
            Flash::error('Ref  Category not found');

            return redirect(route('refCategories.index'));
        }

        $refCategory = $this->refCategoryRepository->update($request->all(), $id);

        Flash::success('Ref  Category updated successfully.');

        return redirect(route('refCategories.index'));
    }

    /**
     * Remove the specified Ref_Category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $refCategory = $this->refCategoryRepository->find($id);

        if (empty($refCategory)) {
            Flash::error('Ref  Category not found');

            return redirect(route('refCategories.index'));
        }

        $this->refCategoryRepository->delete($id);

        Flash::success('Ref  Category deleted successfully.');

        return redirect(route('refCategories.index'));
    }
}
