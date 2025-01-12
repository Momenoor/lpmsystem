<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;

class SubjectController extends AdminController
{
    public function __construct(Subject $model)
    {
        parent::__construct($model);
        $this->moduleActions = ['destroy', 'create', 'index', 'store', 'update', 'edit'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }
 
    public function store(SubjectRequest $request)
    {
        $data = $request->validated();

        $subject = Subject::create($data);

        if ($subject) {
            session()->flash('success', $this->successMessages['create']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['create']);
            return redirect()->back();
        }
    }
 

    public function update(SubjectRequest $request, Subject $subject)
    {
        $data = $request->validated();

        $update = $subject->update($data);

        if ($update) {
            session()->flash('success', $this->successMessages['update']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['update']);
            return redirect()->back();
        }
    }


}
