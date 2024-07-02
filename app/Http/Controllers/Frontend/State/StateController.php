<?php

namespace App\Http\Controllers\Frontend\State;

use App\Http\Controllers\Controller;
use App\Models\System\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    protected $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }


    public function getDistrictByProvince(Request $request)
    {
        $provinces = $request->province_id;
        if (gettype($provinces) === 'array') {
            $value = 'whereIn';
        } else {
            $value = 'where';
        }
        return State::$value('parent_code', $provinces)->where('type', 'admin2')->get();
    }

    public function getMunicipalityByDistrict(Request $request)
    {

        $districts = $request->district_id;
        if (gettype($districts) === 'array') {
            $value = 'whereIn';
        } else {
            $value = 'where';
        }
        $data = State::$value('parent_code', $districts)->where('type', 'admin3')->get();
        return $data;
    }
}
