<?php

namespace App\Http\Controllers\System\Content;

use App\Http\Controllers\ResourceController;
use App\Http\Traits\FileTrait;
use App\Models\System\Content;
use App\Services\System\Content\ContentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends ResourceController
{
    use FileTrait;
    protected $content, $file;
    public function __construct(
        ContentService $service,
        Content $content
    ) {
        $this->service = $service;
        $this->content = $content;
    }

    public function moduleName()
    {
        return 'contents';
    }

    public function folderName()
    {
        return 'content';
    }

    public function store()
    {
        return DB::transaction(function () {

            if (!empty($this->storeValidationRequest())) {
                $request = $this->storeValidationRequest();
            } else {
                $request = $this->defaultRequest();
            }
            $request = app()->make($request);

            $data = $request->except('_token');
            $data['created_by'] = authUser()->id;
            $content = $this->content->create($data);

            if ($request->image) {
                $this->storeImage($request->image, 'uploads/images', $content);
            }

            $this->toastMessage('create');
            return redirect()->back();
        });
    }

    public function update(Request $request, $id)
    {
        return DB::transaction(function () use ($request, $id) {

            $data = $request->except('_token');
            $update = $this->content->find($id);
            if ($request->image) {
                $this->updateOrCreateImage($request->image, 'uploads/images', $update);
            }
            $update->update($data);
            $this->toastMessage('update');
            return redirect()->back();
        });
    }
}
