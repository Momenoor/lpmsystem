<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;

class DepartmentController extends AdminController
{
    public function __construct(Department $model)
    {
        parent::__construct($model);

       
        $this->moduleActions = ['create', 'edit', 'destroy', 'index', 'store', 'update'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }

    /**
     * Store a newly created department in the database.
     */
    public function store(DepartmentRequest $request)
    {
        $data = $request->validated();

        $department = $this->model->create($data);

        if ($department) {
            session()->flash('success', $this->successMessages['create']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['create']);
            return redirect()->back();
        }
    }

    /**
     * Update an existing department in the database.
     */
    public function update(DepartmentRequest $request, $id)
    {
        $data = $request->validated();

        $department = $this->model->findOrFail($id);

        if ($department->update($data)) {
            session()->flash('success', $this->successMessages['update']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['update']);
            return redirect()->back();
        }
    }


}
