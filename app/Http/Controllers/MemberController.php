<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //
    public function index($id) {
        $findMember = USER::find($id)->first();
        return response()->json($findMember);
    }

    public function create(Request $request, $id) {

        $request = json_decode($request->getContent(), true);
        // $request->getContent()는 request body

//        $request->validate([
//            'nickname' => 'required',
//            'gender' => 'required',
//            'introduce' => 'required',
//        ]);
        $nickname  =$request['nickname'];
        $gender  =$request['gender'];
        $introduce  =$request['introduce'];
        $age  =$request['age'];
        $user = USER::find($id)->first();
        $member = new Member();
        $member->gender = $gender;
        $member->introduce = $introduce;
        $member->age = $age;
        $member->nickname = $nickname;
        $member->id = $id;
        $member->user_id = $id;
        $member->user()->associate($user)->save();

//        $member->save();
        return response()->json($member);
    }

    public function edit(Request $request, $id) {
//        $request->validate([
//            'introduce' => 'required',
//        ]);
        $member = MEMBER::find($id)->first();
        $nickname  =$request['nickname'];
        $gender  =$request['gender'];
        $introduce  =$request['introduce'];
        $age  =$request['age'];

        $member->introduce = $introduce;
        $member->gender = $gender;
        $member->age = $age;
        $member->nickname = $nickname;
        $member->save();
        return response()->json($member);
    }

    public function delete($id) {

        $member = MEMBER::find($id)->first();

        $member->delete();
    }
}
