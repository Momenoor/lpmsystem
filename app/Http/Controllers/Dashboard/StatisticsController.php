<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatisticsRequest;
use App\Models\Statistics;

class StatisticsController extends AdminController
{
    public function __construct(Statistics $model)
    {
        parent::__construct($model);
        $this->moduleActions = [ 'index'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }

}
