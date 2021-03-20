@extends('layouts.header1')
@section('title','member')
@section('page-title')
    <img src="{{asset('img/member.png')}}">
    <span class="title">メンバー</span>
@endsection
@section('content')
   
<div class="container" style="padding-bottom:30px">
    <div class="row justify-content-center">
        <div class="col-lg-11" style="padding-top: 50px;">
            <div class="card card-default" >
                <div class="card-body">                    
                    <div class="row" style="margin-top:20px">
                        <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr><th>ユーザ名</th>
                                <th>プロフィール写真</th>
                                <th>店舖編篥権限</th>
                                <th>投稿</th>
                            </tr></thead>
                            <tbody>
                                <tr>
                                    <td>
                                        bikami_shop
                                    </td>
                                    <td>
                                        <img src="{{ asset('img/image/ボブ５.jpg') }}" width="200px" height="200px">
                                    </td>
                                    <td>
                                        OFF
                                    </td>
                                    <td>
                                        掲載停止中
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      
@endsection