<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    protected $model;
    protected $dashView = 'dashboard.pages';
    protected $moduleName;
    protected $methodName;
    protected $methodView;
    protected $moduleActions = [];
    protected $successMessages = [];
    protected $errorMessages = [];
    protected $indexRoute;

    public function __construct(Model $model = null)
    {
        $this->model = $model;
        $this->initializeProperties();
        $this->setFlashMessages();
        $this->shareDataToView();
    }

    /**
     * Initialize common properties for the controller
     */
    protected function initializeProperties()
    {
        $this->moduleName = Str::snake(Str::plural(class_basename($this)));
        $this->methodName = request()->route()->getActionMethod();
        $this->methodView = "{$this->dashView}.{$this->moduleName}.{$this->methodName}";
        $this->indexRoute = route("{$this->moduleName}.index");
        $this->moduleActions = ['destroy', 'create', 'store', 'update'];
    }

    /**
     * Set default success and error messages
     */
    protected function setFlashMessages()
    {
        $this->successMessages = [
            'create' => 'The creation has been saved successfully.',
            'update' => 'The modifications were saved successfully.',
            'delete' => 'Data deleted successfully.',
        ];

        $this->errorMessages = [
            'create' => 'The creation was not saved.',
            'update' => 'The modifications are not saved.',
            'delete' => 'The item was not deleted.',
        ];
    }

    /**
     * Share common data with views
     */
    protected function shareDataToView()
    {
        view()->share([
            'moduleName'   => $this->moduleName,
            'methodName'   => $this->methodName,
            'moduleActions' => $this->moduleActions,
            'successMessages' => $this->successMessages,
        ]);
    }

    /**
     * Show list of items
     */
    public function index()
    {
        $items = $this->model->all();
        return view("{$this->dashView}.{$this->moduleName}.index", compact('items'));
    }

    /**
     * Show details of a single item
     */
    public function show($id)
    {
        $item = $this->model->findOrFail($id);
        return view("{$this->dashView}.{$this->moduleName}.show", compact('item'));
    }

    /**
     * Show the form to create a new item
     */
    public function create()
    {
        return view("{$this->dashView}.{$this->moduleName}.form");
    }

    /**
     * Show the form to edit an existing item
     */
    public function edit($id)
    {
        $item = $this->model->withTrashed()->findOrFail($id);
        return view($this->methodView, compact('item'));
    }

    /**
     * Delete an item
     */
    public function destroy($id)
    {
        $item = $this->model->findOrFail($id);
        if ($item->delete()) {
            session()->flash('success', $this->successMessages['delete']);
        } else {
            session()->flash('error', $this->errorMessages['delete']);
        }
        return redirect()->back();
    }
}
