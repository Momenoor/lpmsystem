<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest; // Custom request for validation
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends AdminController
{
    public function __construct(Event $model)
    {
        parent::__construct($model);
        $this->moduleActions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit'];
        view()->share([
            'moduleActions' => $this->moduleActions,
        ]);
    }

    /**
     * Store a newly created event in the database.
     */
    public function store(EventRequest $request)
    {
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/Event', $imageName);
            $data['image'] = $imageName;
        }

        $event = Event::create($data);

        if ($event) {
            session()->flash('success', $this->successMessages['create']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['create']);
            return redirect()->back();
        }
    }

    /**
     * Update an existing event in the database.
     */
    public function update(EventRequest $request, Event $event)
    {
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image && Storage::exists('public/images/Event/' . $event->image)) {
                Storage::delete('public/images/Event/' . $event->image);
            }

            // Store new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/Event', $imageName);
            $data['image'] = $imageName;
        }

        $update = $event->update($data);

        if ($update) {
            session()->flash('success', $this->successMessages['update']);
            return redirect($this->indexRoute);
        } else {
            session()->flash('error', $this->errorMessages['update']);
            return redirect()->back();
        }
    }


}
