@extends('main')
@section('content')
<br>
<div class="alert mycolor1" role="alert">사용자</div>

<form name="searchform" method="post" action="" >
    <div class="row">
        <div class="col-3" align="left">            
            <div class="input-group  input-group-sm">
                <span class="input-group-text">이름</span>
                <input type="text" name="text1" class="form-control" placeholder="찾을 이름?" onKeydown="if (event.keyCode == 13) { find_text(); }">
                <button class="btn mycolor1" type="button">검색</button>
            </div>
        </div>
        <div class="col-9" align="right">           
            <a href="{{route('member.create')}}" class="btn btn-sm mycolor1" onClick="find_text();">추가</a>
        </div>
    </div>
</form>

<table class="table  table-bordered  table-sm  table-hover mymargin5">
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="20%">아이디</td>
        <td width="20%">암호</td>
        <td width="20%">이름</td>
        <td width="20%">전화</td>
        <td width="10%">등급</td>
    </tr>
    <tr>
    @foreach($list as $row)
    <?
      $tel1 = trim(substr($row->tel2,0,3));
      $tel2 = trim(substr($row->tel2,3,4));
      $tel3 = trim(substr($row->tel2,7,4));
      $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
      $rank = $row->rank2==0 ? '직원' : '관리자';    // 0->직원, 1->관리자 
    ?>
        <td>{{$row->id}}</td>
        <td>{{$row->uid2}}</td>
        <td>{{$row->pwd2}}</td>
        <td><a href="{{route('member.show',$row->id)}}">{{$row->name2}}</a></td>
        <td>{{$tel}}</td>
        <td>{{$rank}}</td>
    </tr>
    @endforeach
</table>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center mymargin5">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
</nav>
@endsection