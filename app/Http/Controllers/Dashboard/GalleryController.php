<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest; // Custom request for validation
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends AdminController
{
    public function __construct(Gallery $model)
    {
        parent::__construct($model);
        $this->moduleActions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }

    /**
     * Store a newly created gallery image in the database.
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/gallery', $imageName);
            $data['image'] = $imageName;
        }

        $gallery = Gallery::create($data);

        if ($gallery) {
            session()->flash('success', $this->successMessages['create']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['create']);
            return redirect()->back();
        }
    }

    /**
     * Update an existing gallery image in the database.
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($gallery->image && Storage::exists('public/images/gallery/' . $gallery->image)) {
                Storage::delete('public/images/gallery/' . $gallery->image);
            }

            // Store new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/gallery', $imageName);
            $data['image'] = $imageName;
        }

        $update = $gallery->update($data);

        if ($update) {
            session()->flash('success', $this->successMessages['update']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['update']);
            return redirect()->back();
        }
    }

    
}
