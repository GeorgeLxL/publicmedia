@extends('layouts.adminheader')

@section('content')
   
<div class="container">
    <form method="POST" action="/saveintro" enctype="multipart/form-data" id="introform">
        {!! csrf_field() !!}
        <div class="row justify-content-center">
            <div class="col-lg-12" style="padding:50px"><h1>基本画像</h1></div>
            <div class="col-lg-3"></div>
            <div class="col-lg-6"  style="padding-top: 50px;">
                <label>
                    <input id="top_image" name="top_image" onchange="readURL(this,'topimg')" type="file" hidden>
                    <img id="topimg" src="{{ asset($returnData['introData'][0]->top_image) }}" width="100%">
                </label> 
            </div>
            <div class="col-lg-3"></div>
            <div class="col-lg-12"><h1>紹介</h1></div>        
            <div class="col-lg-12" >
                <textarea style="width:100%" name="intorducing" id="introducing" rows="4">{{$returnData['introData'][0]->advertise}}</textarea>
            </div>
            <div class="col-lg-12"><h1>How to use</h1></div>
            <table class="table">
                <thead>
                    <tr><th style="width:20%">題名</th>
                    <th style="width:80%">内容</th>
                    <th></th>                       
                </tr></thead>
                <tbody id="guide">
                    @php
                        $i=0;
                    @endphp
                    @foreach($returnData['guideData'] as $guide)
                        <tr class="fieldset">
                            @foreach($guide as $key=>$val)
                                @if($key=='title' || $key=='content')
                                    <td><textarea style="width:100%" type='text' id="menu-{{$key.'.'.$i}}" name="menu-{{$key.'.'.$i}}">{{$val}}</textarea></td>
                                @endif
                                @endforeach
                            <td><a onclick="deleteguide({{$i}})"  data-object-class="menu_group" style="cursor: pointer;" class="fa fa-times remove_nested_fields_link"></a><td>                   
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach                                                   
                </tbody>
                <center><button onclick="addnewguide()" type="button" class="btn-send mb-3">入力フォーム追加</button><center>     
            </table>
            <center><button type="submit" class="btn-send mb-3">保存する</button><center>
        </div>
    </form> 
        

    <form method="POST" action="/savegallery" id="gallery_form" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row justify-content-center">
            <div class="col-lg-12"><h1>Gallerys</h1></div>
            <div class="row " id="gallery_container">
                @foreach($returnData['galleryData'] as $gallery)
                <div class="col-3 gallery_container" >
                    <img style="width:100%" src="{{$gallery->url}}">   
                    <a onclick="deletegallery({{$gallery->id}})"  data-object-class="menu_group" style="cursor: pointer;" class="fa fa-times remove_nested_fields_link"></a>
                </div>            
                @endforeach
                <div class="col-3">
                    <label>
                        <input onchange="savegallery()" type="file" id="gallery_file" name="gallery_file" hidden>
                        <h1>AddNew<h1>
                    </label>   
                </div> 
            </div>
        </div>
    </form>
</div>
<script>
    function savegallery()
    {
        $("#gallery_form").submit();
    }
    $('#gallery_form').submit(function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        var formdata = new FormData(this);
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText){
                    gallerytags="";
                    result = JSON.parse(this.responseText);
                    for(i=0;i<result.length; i++)
                    {
                        gallerytags+="<div class='col-3 gallery_container'><img style='width:100%' src='" + result[i]['url'] + "'><a onclick='deletegallery("+ result[i]['id'] + ")'  data-object-class='menu_group' style='cursor: pointer;' class='fa fa-times remove_nested_fields_link'></a></div>";
                    }
                    gallerytags+="<div class='col-3'><label><input onchange='savegallery()' type='file' id='gallery_file' name='gallery_file' hidden><h1>AddNew</h1></label></div> ";
  
                    $("#gallery_container").html(gallerytags);
                }
            }
        };
        xhttp.open("POST", "{{ url('/savegallery') }}", true);
        xhttp.send(formdata);
    });
    function deletegallery(id)
    {
        let gallery_id = id;
        $.ajax({
                type : 'POST',
                url : "{{ url('/deletegallery') }}",
                data :   {
                    _token: "{{ csrf_token() }}",
                    gallery_id:gallery_id
                },
                success: function(result){
          
                    gallerytags="";
                    result = JSON.parse(result);
                    for(i=0;i<result.length; i++)
                    {
                       
                        gallerytags+="<div class='col-3 gallery_container'><img style='width:100%' src='" + result[i]['url'] + "'><a onclick='deletegallery("+ result[i]['id'] + ")'  data-object-class='menu_group' style='cursor: pointer;' class='fa fa-times remove_nested_fields_link'></a></div>";
                    }
                    gallerytags+="<div class='col-3'><label><input onchange='savegallery()' type='file' id='gallery_file' name='gallery_file' hidden><h1>AddNew</h1></label></div>";
                    $("#gallery_container").html(gallerytags);
                }
            });
    }


    function deleteguide(id)
    {
        var fieldset = document.getElementsByClassName('fieldset');
        var textarea = $('td>textarea');
        for(i=0;i<2;i++)
        {
            textarea[2 * id + i].remove();;
        }
        fieldset[id].remove();
    }

    function addnewguide()
    {
        var textarea = $('td>textarea');
        var fieldset = document.getElementsByClassName('fieldset');
        for (index = 0; index < textarea.length; ++index) {
            textarea[index].setAttribute('value', textarea[index].value);
            textarea[index].innerHTML = textarea[index].value;
        }
        var id = fieldset.length;
        var fieldsettag = "<tr class='fieldset'><td><textarea style='width:100%' id='menu-title"+ id +"' name='menu-title"+ id +"'></textarea></td><td><textarea style='width:100%' id='menu-content"+ id +"' name='menu-content"+ id +"'></textarea></td><td><a onclick='deleteguide(" + id + ")'  data-object-class='menu_group' style='cursor: pointer;' class='fa fa-times remove_nested_fields_link'></a><td></tr>"
        document.getElementById("guide").innerHTML += fieldsettag;
   
    }


    function savemenugroup()
    {
        event.preventDefault();
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        var formdata = new FormData(this);   
       
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText){
                    gallerytags="";
                    result = JSON.parse(this.responseText);
                    for(i=0;i<result.length; i++)
                    {
                        gallerytags+="<div class='col-3 gallery_container'><img style='width:100%' src='" + "public/" + result[i]['url'] + "'><a onclick='deletegallery("+ result[i]['id'] + ")'  data-object-class='menu_group' style='cursor: pointer;' class='fa fa-times remove_nested_fields_link'></a></div>";
                    }
                    gallerytags+="<div class='col-3'><label><input onchange='savegallery()' type='file' id='gallery_file' name='gallery_file' hidden><h1>AddNew</h1></label></div> ";
  
                    $("#gallery_container").html(gallerytags);
                }
            }
        };
        xhttp.open("POST", "{{ url('/saveintro') }}", true);
        xhttp.send(formdata);
    }
    
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