<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DistrictService;
use App\Repositories\RegencyService;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    private $regencyService;
    private $districtService;

    function __construct(DistrictService $districtService, RegencyService $regencyService)
    {
        $this->districtService = $districtService;
        $this->regencyService = $regencyService;
    }

    public function getRegency($province_id)
    {
        $data = $this->regencyService->all()->where('province_id',$province_id)->values();
        return response($data);
    }

    public function getDistrict($regency_id)
    {
        $data = $this->districtService->all()->where('regency_id',$regency_id)->values();
        return response($data);
    }
}
