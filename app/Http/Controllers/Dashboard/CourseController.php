<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest; // Custom request for validation
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class CourseController extends AdminController
{
    public function __construct(Course $model)
    {
        parent::__construct($model); 
        $this->moduleActions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }


    public function store(CourseRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/Course', $imageName);
            $data['image'] = $imageName;
        }

        $course = Course::create($data);

        if ($course) {
            session()->flash('success', $this->successMessages['create']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['create']);
            return redirect()->back();
        }
    }

    
    public function update(CourseRequest $request, Course $course)
    {
        $data = $request->all();

        
        if ($request->hasFile('image')) {
         
            if ($course->image && Storage::exists('public/images/Course/' . $course->image)) {
                Storage::delete('public/images/Course/' . $course->image);
            }

         
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/Course', $imageName);
            $data['image'] = $imageName;
        }

        $update = $course->update($data);

        if ($update) {
            session()->flash('success', $this->successMessages['update']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['update']);
            return redirect()->back();
        }
    }

  
   
}
