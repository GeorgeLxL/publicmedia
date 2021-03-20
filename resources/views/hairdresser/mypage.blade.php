@extends('layouts.header1')
@section('title','mypage')
@section('page-title')
    <img src="{{asset('img/home.png')}}">
    <span class="title">基本情報</span>
@endsection
@section('content')
   
    <div class="container" style="padding-bottom:30px">
        <div class="full-middle" style="margin-top:100px;">
            @if(count($photos)>0)
                <div class="card card-default" style="border-radius:20px;">
                    <div class="card-header" style="height:15px; padding: 3px; border-radius: 19px 19px 0 0; background-color: #FFDCF9;"></div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($photos as $photo)
                                <div class="col-4">
                                    <a href="#"><img style="width: 100%; height: 100%;" src="{{ asset($photo->image) }}"></a>
                                </div>
                                @endforeach                                                    
                            </div>
                        </div>
                    <div class="card-footer" style="height: 15px; padding: 3px; border-radius: 0px 0px 19px 19px; background-color: #FFDCF9;"></div>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12" style="margin-top:10px">
                    <button type="button"  class="btn-send mb-3" data-toggle="modal" data-target="#addphotomadal"  style="float:right; margin-right:20px">追加する&nbsp;</a>
                </div>
               
            </div>
        </div>
    </div>


  <div class="modal fade" id="addphotomadal">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">新しく追加</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">
            <form id="photo_form" method="post" action="/uploadphoto">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-sm-12">
                        <center><label>
                            <input id="image" name="image" onchange="readURL(this,'mainimg')" type="file" hidden>
                            <img id="mainimg" alt="" width="200px" height="200px">
                        </label></center> 
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <label for="hairtype" class="col-2"></label>
                            <label for="hairtype" class="col-2">髪型</label>
                            <select class="col-4" id="hairtype" name="hairtype">
                                <option value="1">ロング</option>
                                <option value="2">セミロング</option>
                                <option value="3">ミディアム</option>
                                <option value="4">ショート</option>
                                <option value="5">ボブ</option>
                                <option value="6">メンズ</option>
                                <option value="7">その他</option>
                            </select>
                        </div>
 
                    </div>
                </div>
                 
                <button type="submit" id="submit" hidden></button>
            </form>
        </div>
    
        <div class="modal-footer">
        	<button type="confirm" onclick="$('#submit').click()" class="btn btn-info">追加する</button>
            <button type="button" class="btn btn-info" data-dismiss="modal">閉じる</button>
        </div>
        
      </div>
    </div>

<script>

    $('form').submit(function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        var formdata = new FormData(this);
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText ==="true"){
                    window.location.href="{{url('/mypage')}}"
                }
            }
        };
        xhttp.open("POST", "{{ url('/uploadphoto') }}", true);
        xhttp.send(formdata);
    });

    function readURL(input,img) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + img).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    
</script>
      
@endsection