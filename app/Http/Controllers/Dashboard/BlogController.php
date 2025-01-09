<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends AdminController
{
    public function __construct(Blog $model)
    {
        parent::__construct($model); // Inherit from AdminController
        $this->moduleActions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }

    /**
     * Store a new blog
     */
    public function store(BlogRequest $request)
    {
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/Blog', $imageName);
            $data['image'] = $imageName;
        }

        $item = Blog::create($data);

        if ($item) {
            session()->flash('success', $this->successMessages['create']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['create']);
            return redirect()->back();
        }
    }

    /**
     * Update an existing blog
     */
    public function update(BlogRequest $request, Blog $Blog)
    {
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($Blog->image && Storage::exists('public/images/Blog/' . $Blog->image)) {
                Storage::delete('public/images/Blog/' . $Blog->image);
            }

            // Store new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/Blog', $imageName);
            $data['image'] = $imageName;
        }

        $update = $Blog->update($data);

        if ($update) {
            session()->flash('success', $this->successMessages['update']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['update']);
            return redirect()->back();
        }
    }
}
