<?php

namespace App\Http\View\Composers;

use App\Models\System\Menu;
use App\Services\System\Menu\MenuService;
use Illuminate\View\View;

class MenuViewComposer
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function compose(View $view)
    {
        $data = [
            'menus' => Menu::whereNotNull('parent_id')
                ->where('status', 1)
                ->orderBy('rank', 'ASC')
                ->get(),
        ];
        $view->with($data);
    }
}
