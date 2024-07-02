<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\System\Menu;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{

    protected $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function run()
    {
        $menus = [
            [
                'rank' => 1,
                'title_eng' => 'Menu Hierarchy',
                'icon' => 'fa-regular fa-list',
                'status' => false,
                'href' => 'home',
                'title_np' => 'मेनु पदानुक्रम',
            ],

            // [
            //     'rank' => 1,
            //     'title_eng' => 'Home',
            //     'icon' => 'fa-regular fa-user',
            //     'href' => 'home',
            //     'title_np' => 'गृहप्रिस्ट',
            // ],

            // [
            //     'rank' => 2,
            //     'icon' => 'fa-circle-question',
            //     'href' => 'aboutus',
            //     'title_eng' => 'About Us',
            //     'title_np' => 'हाम्रो बारे',
            // ],
            // [
            //     'rank' => 3,
            //     'icon' => 'fa-solid fa-user-gear',
            //     'href' => 'career',
            //     'title_eng' => 'Career',
            //     'title_np' => 'कामहरु ',
            // ],

            // [
            //     'rank' => 4,
            //     'icon' => 'fa-regular fa-image',
            //     'href' => 'gallery',
            //     'title_eng' => 'Gallery',
            //     'title_np' => 'ग्यालेरी ',
            // ],

            // [
            //     'rank' => 5,
            //     'icon' => 'fa-solid fa-bars-progress',
            //     'href' => 'service',
            //     'title_eng' => 'Services',
            //     'title_np' => 'सुविधाहरु ',
            // ],

            // [
            //     'rank' => 6,
            //     'icon' => 'fa-solid fa-phone',
            //     'href' => 'contact',
            //     'title_eng' => 'Contact',
            //     'title_np' => 'सम्पर्क',
            // ],

            // [
            //     'rank' => 1,
            //     'title_eng' => 'Photos',
            //     'title_np' => 'फोटोहरु',
            //     'parent_title_eng' => 'Gallery', // Add this line
            // ],
            // [
            //     'rank' => 2,
            //     'title_eng' => 'Videos',
            //     'title_np' => 'भिडिओहरु',
            //     'parent_title_eng' => 'Gallery', // Add this line
            // ],
        ];

        foreach ($menus as $menu) {
            $this->menu->updateOrInsert(
                ['title_eng' => $menu['title_eng']],
                [
                    'rank' => $menu['rank'] ?? null,
                    'title_eng' => $menu['title_eng'],
                    'status' => $menu['status'],
                    'is_child'  => $menu['is_child'] ?? false,
                    'title_np' => $menu['title_np'],
                    'href' => $menu['href'] ?? null,
                    'created_by' => authUser()->id ?? 1,
                    'updated_by' => authUser()->id ?? 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Now, set the 'parent_id' based on the inserted records
        foreach ($menus as $menu) {
            if (isset($menu['parent_title_eng'])) {
                $parent_id = $this->menu->where('title_eng', $menu['parent_title_eng'])->value('id');
                $this->menu->where('title_eng', $menu['title_eng'])->update(['parent_id' => $parent_id]);
            }
        }
    }
}
