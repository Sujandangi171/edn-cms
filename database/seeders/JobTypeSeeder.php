<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\System\VacancyType;

class JobTypeSeeder extends Seeder
{

    protected $model;

    public function __construct(VacancyType $model)
    {
        $this->model = $model;
    }

    public function run()
    {
        $types = [
            [
                'title' => 'Job',
                'status' => true,
            ],
            [
                'title' => 'Internship',
                'status' => true,
            ],

        ];

        foreach ($types as $type) {
            $this->model->updateOrInsert(
                ['title' => $type['title']],
                [
                    'status' => $type['status'] ?? null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
