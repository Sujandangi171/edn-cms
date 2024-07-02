<?php

namespace App\Services\System\Menu;

use App\Models\System\Content;
use App\Models\System\ContentType;
use App\Models\System\Menu;
use App\Services\Service;
use Exception;
use Illuminate\Http\Request;

class MenuService extends Service
{
    protected $content, $contentType;

    public function __construct(
        Menu $model,
        Content $content,
        ContentType $contentType
    ) {
        parent::__construct($model);
        $this->content = $content;
        $this->contentType = $contentType;
    }

    public function getAllData($request)
    {
        $query = $this->query()
            ->orderBy('rank', 'ASC')
            ->whereNotNull('parent_id');
        return $query->paginate(PAGINATE);
    }

    public function indexPageData(Request $request)
    {
        return   [
            'items' => $this->getAllData($request),
            'contentTypes' => $this->contentType->active()->rank()->pluck('title', 'id'),
            'title' => $this->model->where('id', $request->menuId)->value('title_eng'),
            'content' => Content::where('menu_id', $request->menuId)->first() ?? null
        ];
    }

    public function store($request)
    {
        try {
            $data = $request->except('_token');
            $data['parent_id'] = isset($data['menu_id']) ? $data['menu_id'] : 1;
            $data['is_child'] = isset($data['menu_id']) ? true : false;
            $data['created_by'] = authUser()->id;
            $this->model->create($data);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function checkIfChildExists($id)
    {
        return $this->model->where('parent_id', $id)->first();
    }
}
