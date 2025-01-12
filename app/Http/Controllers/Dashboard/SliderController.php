<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends AdminController
{
    public function __construct(Slider $model)
    {
        parent::__construct($model);
        $this->moduleActions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }

  
    public function index()
    {
        $sliders = Slider::all();
        return view("{$this->dashView}.{$this->moduleName}.index", compact('sliders'));
    }

   
    public function create()
    {
        return view("{$this->dashView}.{$this->moduleName}.form");
    }

    public function store(SliderRequest $request)
    {
        $data = $request->validated();

     
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/sliders', $imageName);
            $data['image'] = $imageName;
        }

        $slider = Slider::create($data);

        if ($slider) {
            session()->flash('success', $this->successMessages['create']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['create']);
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view("{$this->dashView}.{$this->moduleName}.form", compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        $data = $request->validated();

   
        if ($request->hasFile('image')) {
   
            if ($slider->image && Storage::exists('public/images/sliders/' . $slider->image)) {
                Storage::delete('public/images/sliders/' . $slider->image);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/sliders', $imageName);
            $data['image'] = $imageName;
        }

        $update = $slider->update($data);

        if ($update) {
            session()->flash('success', $this->successMessages['update']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['update']);
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

 
        if ($slider->image && Storage::exists('public/images/sliders/' . $slider->image)) {
            Storage::delete('public/images/sliders/' . $slider->image);
        }

        if ($slider->delete()) {
            session()->flash('success', $this->successMessages['delete']);
        } else {
            session()->flash('error', $this->errorMessages['delete']);
        }

        return redirect()->back();
    }
}
