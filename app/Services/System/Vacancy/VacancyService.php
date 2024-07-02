<?php

namespace App\Services\System\Vacancy;

use App\Models\System\Vacancy;
use App\Models\System\VacancyType;
use App\Services\Service;
use Illuminate\Http\Request;

class VacancyService extends Service
{
    protected $vacancyType;
    public function __construct(Vacancy $model, VacancyType $vacancyType)
    {
        parent::__construct($model);
        $this->vacancyType = $vacancyType;
    }

    public function getAllData($request)
    {
        $query = $this->query()->with('vacancyType');
        if (isset($request->keyword)) {
            $query->where('title', 'ILIKE',  '%' . $request->keyword . '%');
        }

        if (isset($request->vacancy_type_id)) {
            $query->where('vacancy_type_id',  $request->vacancy_type_id);
        }
        return $query->orderBy('updated_at', 'DESC')->paginate(PAGINATE);
    }

    public function getItemById($id)
    {
        return  $this->model->with('user')->where('id', $id)->first();
    }

    public function indexPageData(Request $request)
    {
        return  [
            'items' => $this->getAllData($request),
            'types' => $this->vacancyType->pluck('title', 'id')
        ];
    }

    public function createPageData($request)
    {
        return [
            'status' => $this->status(),
            'types' => $this->vacancyType->pluck('title', 'id')
        ];
    }

    public function editPageData($id)
    {
        return [
            'item' => $this->getItemById($id),
            'types' => $this->vacancyType->pluck('title', 'id'),
            'status' => $this->status()
        ];
    }
}
