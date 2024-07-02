<?php

namespace App\Http\Controllers\System\Menu;

use App\Http\Controllers\ResourceController;
use App\Models\System\Menu;
use App\Services\System\Menu\MenuService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends ResourceController
{
    protected $service;

    public function __construct(MenuService $service)
    {
        $this->service = $service;
    }

    // public function storeValidationRequest()
    // {
    //     return 'App\Http\Requests\System\MenuRequest';
    // }

    public function moduleName()
    {
        return 'menus';
    }

    public function folderName()
    {
        return 'menu';
    }



    // public function getMenuInfo(Request $request)
    // {
    //     return $this->service->getMenuInfo($request);
    // }

    public function destroy($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $result = $this->service->checkIfChildExists($id);

                if (!isset($result)) {
                    $this->service->delete($id);
                    $this->toastMessage('delete');
                    return redirect()->route($this->moduleName() . '.index');
                } else {
                    return redirect()->back()->withErrors(['msg' => "This menu can't be deleted because it has sub menus."]);
                }
            });
        } catch (Exception $e) {
            dd($e);
        }
    }
}
