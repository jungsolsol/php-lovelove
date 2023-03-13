<?php
namespace App\Http\Controllers;

use App\Http\Utils\Geolocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MapController extends Controller
{
    /**
     * LAT, LON 데이터를 받아서
     * members 테이블에 위치정보 업데이트 이후
     * 주변 위치의 이성 탐색 -> index()
     */



    public function index() {
        /**
         * 현재 내 위치 받아오기
         * response => lat, lon
         */
        $jsonResponse = Geolocation::getCurrentLocation();
//        dd($currentCoordinate);

//        $findMember = Member::find($id)->first();
//        $findMember->point =
//        $currentCoordinate ;

        return $jsonResponse;
    }

    public function create()
    {


    }
};
