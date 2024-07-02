<?php

namespace Database\Seeders;

use App\Models\System\ContentType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ContentTypeSeeder extends Seeder
{
    protected $model;

    public function __construct(ContentType $model)
    {
        $this->model = $model;
    }

    public function run()
    {
        $contentTypes = [
            [
                'title' => 'Normal Content',
                'slug' => 'normal_content',
                'rank' => 1,
                'status' => true
            ],
            [
                'title' => 'Content With Image',
                'slug' => 'content_with_image',
                'rank' => 2,
                'status' => true
            ],
        ];

        foreach ($contentTypes as $type) {
            $this->model->updateOrInsert(
                ['slug' => $type['slug']],
                [
                    'title' => $type['title'] ?? null,
                    'slug' => $type['slug'] ?? null,
                    'rank' => $type['rank'] ?? null,
                    'status' => $type['status'] ?? null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
