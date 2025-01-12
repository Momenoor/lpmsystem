<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\HonorListRequest; // Custom request for validation
use App\Models\HonorList;
use Illuminate\Http\Request;

class HonorListController extends AdminController
{
    public function __construct(HonorList $model)
    {
        parent::__construct($model);
        $this->moduleActions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }

    /**
     * Store a newly created honor list entry in the database.
     */
    public function store(HonorListRequest $request)
    {
        $data = $request->all();

        $honorList = HonorList::create($data);

        if ($honorList) {
            session()->flash('success', $this->successMessages['create']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['create']);
            return redirect()->back();
        }
    }

    /**
     * Update an existing honor list entry in the database.
     */
    public function update(HonorListRequest $request, HonorList $honorList)
    {
        $data = $request->all();

        $update = $honorList->update($data);

        if ($update) {
            session()->flash('success', $this->successMessages['update']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['update']);
            return redirect()->back();
        }
    }

 
}
