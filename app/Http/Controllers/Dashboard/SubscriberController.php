<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;

class SubscriberController extends AdminController
{
    public function __construct(Subscriber $model)
    {
        parent::__construct($model);
        $this->moduleActions = [ 'index'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }

 
}
