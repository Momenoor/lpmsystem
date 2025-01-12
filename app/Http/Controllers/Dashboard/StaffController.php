<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest; 
use App\Models\Staff;
use Illuminate\Support\Facades\Storage;

class StaffController extends AdminController
{
    public function __construct(Staff $model)
    {
        parent::__construct($model);
        $this->moduleActions = ['index'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }

}
