@extends('main')
@section('content')
<br>
<div div class="alert mycolor1" role="alert">사용자</div>

<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{$row->id}}</td>
    </tr>
    <tr>
        <td class="mycolor2"><font color="red">*</font> 이름</td>
        <td width="80%" align="left">{{$row->name2}}</td>

    </tr>
    <tr>
        <td class="mycolor2"><font color="red">*</font> 아이디</td>
        <td width="80%" align="left">{{$row->uid2}}</td>

    </tr>
    <tr>
        <td class="mycolor2"><font color="red">*</font> 암호</td>
        <td width="80%" align="left">{{$row->pwd2}}</td>

    </tr>
    <tr>
        <td class="mycolor2">전화</td>
        <td width="80%" align="left">
            <?
            $tel1 = trim(substr($row->tel2,0,3));
            $tel2 = trim(substr($row->tel2,3,4));
            $tel3 = trim(substr($row->tel2,7,4));
            $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
            ?>
            {{$tel}}
        </td>
    </tr>
    <tr>
        <td class="mycolor2">등급</td>
        <td align="left">
            <div class="fd-inline-flex">
                <?
                $row->rank2 == 0 ? $rank = "직원" : $rank = "관리자";
                ?>
                {{$rank}}
            </div>
        </td>
    </tr>
</table>
<div align="center">
    <table>
        <tr>
            <td>
                <button type="submit" class="btn btn-sm mycolor1">수정</button> &nbsp
            </td>
            <td>
                <form name="deleteform" method="post" action="{{route('member.destroy',$row->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요 ?');">삭제</button> &nbsp
                </form>
            </td>
            <td>
                <button type="submit" class="btn btn-sm mycolor1">이전화면</button> &nbsp
            </td>
        </tr>
    </table>
</div>
@endsection