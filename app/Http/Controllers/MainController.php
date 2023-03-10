<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Memo;
use PhpParser\Node\Expr\Cast\Bool_;

//Memo 모델을 사용한다.
class MainController extends Controller
{

    public function main()
    {



        return view('main');
    }
    //웹 최초 진입시 처리.
    public function index(){
        // memos 테이블에서 메모 생성 날짜 기준 내림차순으로 정렬해 가져온다.
        $memos = Memo::orderBy('created_at', 'desc')->get();
        //index view와 가져온 메모 데이터를 렌더링해 브라우저에 출력.
        return view('index',['memos' => $memos]);
    }

    //create 요청을 받는다.
    public function create(){
        return view('create'); //view를 렌더링해 브라우저에 출력.
    }

    //create view에서 메모 삽입 요청시 처리.
    public function store(Request $request){

        //request 객체를 통해 메모 내용을 가져온다.
        //validate 메서드를 이용해 메모 길이가 500을 넘는지 검사한다.
        //500이 넘어가면 create view에 에러를 반환하고 데이터는 삽입되지 않는다.
        $content = $request->validate(['content' => 'required:max:500']);

        //memos테이블에 데이터 삽입.
        Memo::create($content);

        //삽입이 끝나면 index 메서드로 리다이렉트.
        return redirect()->route('index');
    }

    //메모 수정 요청
    public function edit(Request $request){
        //request 객체를 통해 수정하고자 하는 메모의 id값을 받는다.
        $memo = Memo::find($request->id);

        //edit view와 해당 메모를 렌더링, 브라우저 출력
        return view('edit',['memo' => $memo]);
    }

    //edit view에서 수정된 메모를 적용하는 요청.
    public function update(Request $request){

        //memo테이블에서 요청 받은 id값의 데이터를 호출.
        $memo = Memo::find($request->id);

        //메모 내용이 500자가 넘는지 검사.
        $content = $request->validate(['content' => 'required:max:500']);

        //수정된 메모를 테이블에 적용하고 save한다.
        $memo->fill($content)->save();

        //index 메서드로 리다이렉트.
        return redirect()->route('index');
    }

    //메모 삭제 요청
    public function delete(Request $request){
        //id를 통해 해당하는 row를 찾는다.
        $memo = Memo::find($request->id);

        $memo->delete(); // row 삭제.
        //index 메서드로 리다이렉트.
        return redirect()->route('index');
    }
}
