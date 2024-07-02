<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\System\University;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{

    protected $model;

    public function __construct(University $model)
    {
        $this->model = $model;
    }

    public function run()
    {
        $roles = [
            [
                'title' => 'Tribhubhan University',
                'status' => true,
                'rank' => 1,
            ],
            [
                'title' => 'Kathmandu University',
                'status' => true,
                'rank' => 2,
            ],  [
                'title' => 'Pokhara University',
                'status' => true,
                'rank' => 4,
            ], [
                'title' => 'Purbanchal University',
                'status' => true,
                'rank' => 5,
            ], [
                'title' => 'Nepal Sanskrit University',
                'status' => true,
                'rank' => 6,
            ], [
                'title' => 'Lumbini Bouddha University',
                'status' => true,
                'rank' => 7,
            ], [
                'title' => 'Far-Western University',
                'status' => true,
                'rank' => 8,
            ], [
                'title' => 'Mid-Western University',
                'status' => true,
                'rank' => 9,
            ], [
                'title' => 'Agriculture and Forestry University',
                'status' => true,
                'rank' => 10,
            ],
            [
                'title' => 'Nepal Open University',
                'status' => true,
                'rank' => 11,
            ],
            [
                'title' => 'Rajarshi Janak University',
                'status' => true,
                'rank' => 12,
            ],
        ];

        foreach ($roles as $role) {
            $this->model->updateOrInsert(
                ['title' => $role['title']],
                [
                    'title' => $role['title'] ?? null,
                    'status' => $role['status'] ?? null,
                    'rank' => $role['rank'] ?? null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
