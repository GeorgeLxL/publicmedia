@extends('layouts.header1')
@section('title','menu')
@section('page-title')
    <img src="{{asset('img/menu.png')}}">
    <span class="title">メニュー</span>
@endsection
@section('content')
   
<div class="container" style="padding-bottom:30px">
    <div class="row justify-content-center">
        <div class="col-lg-11" style="padding-top: 70px;">
            <div class="card card-default" >
            <div class="card-header">メニュー</div>
                <div class="card-body">
                    <h6>メニューグループ</h6>
                        <center>
                            <a href="menu_groups/edit" class="menu_button">メニューグループを編集する</a>
                        </center>
                        @foreach($returnval['menu_groups'] as $row)
                            <div>{{$row->name}}</div>    
                        @endforeach
                    <hr>
                    <h6>メニ1ュー</h6>
                    @php
                    $i=0;
                    @endphp
                    @foreach($returnval['menu_groups'] as $row)
                        <div class="menu-group-title"> {{$row->name}} のメニュー </div>                           
                        <div class="row" style="margin-top:20px">
                            <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr><th>名前</th>
                                    <th>金額</th>
                                    <th>説明</th>
                                    <th> 所要時間</th>                                   
                                </tr></thead>
                                <tbody>
                                    
                                        @foreach($returnval['menus'][$i] as $menu)
                                        <tr>
                                            @foreach($menu as $key=>$val)
                                                @if($key=='name' || $key=='amount' || $key=='explanation' || $key=='requiretime')
                                                    <td>{{$val}}</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                        @endforeach
                                                                       
                                </tbody>
                            </table>
                            <center>
                                <a href="menu/edit/{{$row->name}}" class="menu_button">{{$row->name}}のメニューを編集する</a>
                            </center>
                            </div>
                        </div>
                        @php
                        $i++;
                        @endphp
                    @endforeach  
                </div>
            </div>
        </div>
    </div>
</div>
      
@endsection