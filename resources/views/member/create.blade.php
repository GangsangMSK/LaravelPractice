@extends('main')
@section('content')
<br>
<div div class="alert mycolor1" role="alert">사용자</div>
<form name="storeform" method="post" action="{{route('member.store')}}">
@csrf
    <table class="table table-bordered table-sm mymargin5">
        <tr>
            <td class="mycolor2"><font color="red">*</font> 이름</td>
            <td align="left">
                <div class="fd-inline-flex">
                    <input  type="text" name="name" size="20" maxlength="20" class="form-control form-control-sm" value="{{old('name')}}">
                </div>
                @error('name') {{$message}} @enderror
            </td>
        </tr>
        <tr>
            <td class="mycolor2"><font color="red">*</font> 아이디</td>
            <td align="left">
                <div class="fd-inline-flex">
                    <input  type="text" name="uid" size="20" maxlength="20" class="form-control form-control-sm" value="{{old('uid')}}">
                </div>
                @error('uid') {{$message}} @enderror
            </td>
        </tr>
        <tr>
            <td class="mycolor2"><font color="red">*</font> 암호</td>
            <td align="left">
                <div class="fd-inline-flex">
                    <input  type="password" name="pwd" size="20" maxlength="20" class="form-control form-control-sm" value="{{old('pwd')}}">
                </div>
                @error('pwd') {{$message}} @enderror
            </td>
        </tr>
        <tr>
            <td class="mycolor2">전화</td>
            <td align="left">
                <div class="d-inline-flex">
                    <input type="text" name="tel1" size="3" maxlength="3" value="" class="form-control form-control-sm">
                </div> -
                <div class="d-inline-flex">
                    <input type="text" name="tel2" size="4" maxlength="4" class="form-control form-control-sm">
                </div> -
                <div class="d-inline-flex">
                    <input type="text" name="tel3" size="4" maxlength="4" class="form-control form-control-sm">
                </div>
            </td>
        </tr>
        <tr>
            <td class="mycolor2">등급</td>
            <td align="left">
                <div class="fd-inline-flex">
                    <input type="radio" name="rank" value="2" checked> 고객 &nbsp;
                    <input type="radio" name="rank" value="0"> 직원 &nbsp;
                    <input type="radio" name="rank" value="1"> 관리자
                </div>
            </td>
        </tr>
    </table>
    <div align="center">
        <table>
            <tr>
                <button type="submit" class="btn btn-sm mycolor1">저장</button> &nbsp
</form>
        </tr>
        <tr>
            <input type="button" value="이전화면" class="btn btn-sm mycolor1">
        </tr>
    </table>
</div>
@endsection