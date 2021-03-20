@extends('layouts.header1')
@section('title','reservation')
@section('page-title')
    <img src="{{asset('img/reservation.png')}}">
    <span class="title">予約</span>
@endsection
@section('content')
   
<div class="container" style="padding-bottom:30px">
    <div class="row justify-content-center">
        <div class="col-lg-11" style="padding-top: 60px;">
            <div class="card card-default">
                <div class="card-header">予約</div>
                <div class="card-body">
                                                   
                        <div class="row" style="margin-top:20px">
                            <div class="col-md-2" style="margin-bottom: 20px;" >状態</div>
                            <div class="col-md-4" style="margin-bottom: 20px;">
                                <select onchange="settype()" style="width: 100%;" id="status" name="status" >
                                    <option {{$selectedval==0?"selected":""}} value="0">すべて</option>
                                    <option {{$selectedval==1?"selected":""}} value="1">予約済み</option>
                                    <option {{$selectedval==2?"selected":""}} value="2">完了</option>
                                    <option {{$selectedval==3?"selected":""}} value="3">辞退</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                            @php
                                $status=array("","予約済み","完了","辞退")
                            @endphp
                            <table class="table">
                                <thead>
                                    <tr><th>お客様</th>
                                    <th>メニュー</th>
                                    <th>第1希望</th>
                                    <th>第2希望</th>
                                    <th>第3希望</th>
                                    <th>金額</th> 
                                    <th>状態</th>
                                    <th>完了</th>
                                </tr></thead>
                                <tbody>                                    
                                    @foreach($returnData as $reservation)
                                    <tr>
                                        @foreach($reservation as $key=>$val)
                                            @if($key=="reservation_status")
                                            <td>{{$status[$val]}}</td>
                                            @elseif($key!="id")
                                            <td>{{$val=="NULL"? "":$val}}</td>

                                            @endif
                                        @endforeach
                                        <td><input type="checkbox" id="check{{$reservation->id}}" onchange="complete({{$reservation->id}})" {{$reservation->reservation_status=="3" ? "disabled ":""}} {{$reservation->reservation_status=="2" ? "checked":""}} ></td>
                                    </tr>
                                    @endforeach                                       
                                </tbody>
                            </table>
                            </div>
                        </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function complete(id){
        let reservation_id = id;
        let status = document.getElementById("check"+id).checked;
        $.ajax({
                type : 'POST',
                url : "{{ url('/setcompleted') }}",
                data :   {
                    _token: "{{ csrf_token() }}",
                    reservation_id:reservation_id,
                    status:status

                }
        });
    }

    function settype()
    {
        let status = document.getElementById("status").value;
        window.location.href="/reserve/" + status;
    }
</script>
      
@endsection