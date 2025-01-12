<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends AdminController
{
    public function __construct(Setting $model)
    {
        parent::__construct($model);
        $this->moduleActions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }
    /**
     * Store a newly created setting in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string|unique:settings,key',
            'value' => 'required',
        ]);

        Setting::set($data['key'], $data['value']);

        session()->flash('success', $this->successMessages['create']);
        return redirect($this->indexRoute);
    }

 

    /**
     * Update the specified setting in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $data = $request->validate([
            'key' => 'required|string|unique:settings,key,' . $setting->id,
            'value' => 'required',
        ]);

        Setting::set($data['key'], $data['value']);

        session()->flash('success', $this->successMessages['update']);
        return redirect($this->indexRoute);
    }

 
}
