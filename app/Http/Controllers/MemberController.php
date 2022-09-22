<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = $this->getlist();		// 자료 읽기
        return view( 'member.index', $data );	// 자료 표시(view/member폴더의 index.blade.php)    
    }

    public function getlist()
    {
        $result = Member::orderby('name2')->get();
        return $result;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'uid' => 'required|max:20',
            'pwd' => 'required|max:20',
            'name' => 'required|max:20'
            ],
            [
            'uid.required'  => '아이디는 필수입력입니다.',
            'pwd.required' => '암호는 필수입력입니다.',
            'name.required' => '이름은 필수입력입니다.',
            'uid.max'  => '20자 이내입니다.',
            'pwd.max' => '20자 이내입니다.',
            'name.max' => '20자 이내입니다.'
            ]
        );

        $tel1= $request->input("tel1");
        $tel2= $request->input("tel2");
        $tel3= $request->input("tel3");
        $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);	// 전화번호 합치기

        $row = new Member; 		// member 모델변수 row 선언

        $row->uid2 = $request->input("uid");	// 값 입력 
        $row->pwd2 = $request->input("pwd");
        $row->name2 = $request->input("name");
        $row->tel2 = $tel;
        $row->rank2 = $request->input("rank");

        $row->save();			// 저장
        
        return redirect('member');		// 목록화면으로 이동
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row'] = Member::find($id);
        return view('member.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return redirect("member");
    }
}
