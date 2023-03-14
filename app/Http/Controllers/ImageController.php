<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class ImageController extends Controller
{
    /**
     * 프로필 사진 등록 ,수정, 삭제 및 주변 이성 프로필 사진 확인
     * 사진 저장은 로컬 저장소활용 (추후 cloud 사용)
     * @return void
     */
    public function create(Request $request, $id)
    {

        $validation = $request -> validate([
            'picture' => 'image|mimes:jpeg,png,jpg,gif',
            'title' => 'required',
        ]);


    }


}
