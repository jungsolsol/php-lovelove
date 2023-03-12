<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //
    public function index($id) {
        $findMember = USER::find($id)->first();


        return response()->json($findMember);
    }

    public function create(Request $request, $id) {

        $request->validate([
            'nickname' => 'required',
            'gender' => 'required',
            'introduce' => 'required',
        ]);
        $nickname = $request->input('nickname');
        $gender = $request->input('gender');
        $introduce = $request->input('introduce');
        $age = $request->input('age');

//        dump($request . get_current_user());
        $member = MEMBER::find($id)->first();

//        $member->id = $request.get_current_user()
        $member->gender = $gender;
        $member->introduce = $introduce;
        $member->age = $age;
        $member->nickname = $nickname;
        $member->save();
        return response()->json($member);
    }

    public function edit($id) {

    }

    public function delete($id) {

    }
}
