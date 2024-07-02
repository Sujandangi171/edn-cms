<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    protected $model, $service;

    public function storeValidationRequest()
    {
        return '';
    }

    public function defaultRequest()
    {
        return 'Illuminate\Http\Request';
    }

    public function indexUrl()
    {
        return  $this->moduleName();
    }

    public function moduleToTitle()
    {
        $title = ' ';
        $data = explode('-', $this->folderName());
        foreach ($data as $d) {
            $title .= $d . ' ';
        }
        return ucwords($title);
    }

    public function baseBreadCrumb()
    {
        return [
            'title' => 'Dashboard',
            'link' =>  'home.index',
            'active' => true
        ];
    }

    public function breadCrumbForIndex()
    {
        $breadCrumb = [
            $this->baseBreadCrumb(), [
                'title' => $this->moduleToTitle(),
                'link' => $this->indexUrl(),
            ]
        ];
        return $breadCrumb;
    }

    public function index(Request $request)
    {
        $data = $this->service->indexPageData($request);
        $data['indexUrl'] =  $this->indexUrl();
        $data['moduleName'] = $this->moduleToTitle();
        $data['breadCrumb'] =  $this->breadCrumbForIndex();
        return view('system.' . $this->folderName() . '.index', $data);
    }

    public function breadCrumbForCreate($title = 'Create')
    {
        $breadCrumb = [
            $this->baseBreadCrumb(),
            [
                'title' => $this->moduleToTitle(),
                'link' => $this->indexUrl() . '.index',
                'active' => true
            ],
            [
                'title' => $title,
            ]
        ];
        return $breadCrumb;
    }

    public function create(Request $request)
    {
        $data = $this->service->createPageData($request);
        $data['indexUrl'] = $this->indexUrl();
        $data['moduleName'] = $this->moduleToTitle();
        $data['breadCrumb'] = $this->breadCrumbForCreate();
        return view('system.' . $this->folderName() . '.form', $data);
    }

    public function store()
    {
        // try {
        if (!empty($this->storeValidationRequest())) {
            $request = $this->storeValidationRequest();
        } else {
            $request = $this->defaultRequest();
        }
        $request = app()->make($request);
        $this->service->store($request);
        $this->toastMessage('create');
        return redirect()->route($this->moduleName() . '.index');
        // } catch (Exception $e) {
        //     return redirect()->back()->withErrors(['serverError' => $e->getMessage()]);
        // }
    }

    public function edit($id)
    {
        $data = $this->service->editPageData($id);
        $data['indexUrl'] = $this->moduleName();
        $data['moduleName'] = $this->moduleToTitle();
        $data['breadCrumb'] = $this->breadCrumbForCreate($title = 'Edit');
        return view('system.' . $this->folderName() . '.form', $data);
    }

    public function update(Request $request, $id)
    {
        if (!empty($this->storeValidationRequest())) {
            $request = $this->storeValidationRequest();
        } else {
            $request = $this->defaultRequest();
        }
        $request = app()->make($request);
        $this->service->update($request, $id);
        $this->toastMessage('update');
        return redirect()->route($this->moduleName() . '.index');
    }
    public function destroy($id)
    {
        $this->service->delete($id);
        $this->toastMessage('delete');
        return redirect()->route($this->moduleName() . '.index');
    }

    public function show(Request $request, $id)
    {
        $data = $this->service->showPageData($request, $id);
        $data['indexUrl'] =  $this->indexUrl();
        $data['moduleName'] = $this->moduleToTitle();
        $data['breadCrumb'] =  $this->breadCrumbForCreate('Detail');
        return view('system.' . $this->folderName() . '.show', $data);
    }

    public function toastMessage($type)
    {
        $actions = [
            'create' => 'created',
            'update' => 'updated',
            'delete' => 'deleted',
        ];

        if (array_key_exists($type, $actions)) {
            $action = $actions[$type];
            $message = "has been $action successfully.";
            $module = $this->folderName();
            return flash()->options([
                'timeout' => 2000
            ])->addSuccess("$module $message", 'Success');
        }
    }

    public function changeStatus($id)
    {
        $data = $this->service->getItemById($id);
        $data->update([
            'status' => $data->status === 1 ? 0 : 1
        ]);
        flash()->options([
            'timeout' => 2000
        ])->addSuccess('Status changed successfully.');
        return redirect()->back();
    }
}
