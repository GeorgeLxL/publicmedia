@extends('layouts.header1')
@section('title','menu')
@section('page-title')
    <img src="{{asset('img/menu.png')}}">
    <span class="title">メニュー</span>
@endsection
@section('content')
   
<div class="container" style="padding-bottom:30px">
    <div class="row justify-content-center">
        <div class="col-lg-11" style="padding-top: 50px;">
            <div class="card card-default" >
                <div class="card-body">
                    <form id="edit_menu" action="/users/update_menu"method="post">
                        <input type='hidden' id="menugroupname" value="{{$returndata['menugroupname']}}">
                            <table class="table">
                                <thead>
                                    <tr><th>名前</th>
                                    <th>金額</th>
                                    <th>説明</th>
                                    <th> 所要時間</th>
                                    <th></th>                                  
                                </tr></thead>
                                <tbody id="menu_pan">
                                    @php
                                    $i=0;
                                    @endphp
                                        @foreach($returndata['menus'] as $menu)
                                        <tr class="fieldset">
                                            @foreach($menu as $key=>$val)
                                                @if($key=='name' || $key=='amount' || $key=='explanation' || $key=='requiretime')
                                                    <td><input type='text' id="menu-{{$key.'.'.$i}}" name="menu-{{$key.'.'.$i}}" value="{{$val}}"></td>
                                               
                                                @endif
                                                @endforeach
                                            <td><a onclick="delete_menu({{$i}})"  data-object-class="menu_group" style="cursor: pointer;" class="fa fa-times remove_nested_fields_link"></a><td>
                                        
                                        </tr>
                                        @php
                                        $i++;
                                        @endphp
                                        @endforeach
                                                                       
                                </tbody>
                            </table>      
                        <a style="color:#7B8BDC; text-decoration:none; cursor: pointer; border-radius 3px; border:solid 1px" onclick="addnewmenu()">入力フォーム追加</a>
                        <center>
                            <a onclick="savemenugroup()" class="menu_button">保存する</a>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addnewmenu()
    {
        var inputs = document.getElementsByTagName('input');
        for (index = 0; index < inputs.length; ++index) {
            inputs[index].setAttribute('value', inputs[index].value);
        }
        var fieldset = document.getElementsByClassName('fieldset');
        var id = fieldset.length;
        var fieldsettag = "<tr class='fieldset'><td><input type='text' id='menu-name."+ id + "' name='menu-name."+ id + "' value=''></td><td><input type='text' id='menu-amount."+ id + "' name='menu-amount."+ id + "' value=''></td><td><input type='text' id='menu-explanation."+ id + "' name='menu-explanation."+ id + "' value=''></td><td><input type='text' id='menu-requiretime."+ id + "' name='menu-requiretime."+ id + "' value=''></td><td><a onclick='delete_menu(" + id + ")'  data-object-class='menu_group' style='cursor: pointer;' class='fa fa-times remove_nested_fields_link'></a><td></tr>";
        document.getElementById("menu_pan").innerHTML += fieldsettag;
    }

    function delete_menu(id)
    {
        var fieldset = document.getElementsByClassName('fieldset');
        var inputs = document.getElementsByTagName('input');
        for(i=0;i<4;i++)
        {
            inputs[4 * id + i].style.display = 'none';
        }
        fieldset[id].style.display = 'none';   
    }

    function savemenugroup()
    {
        var allinput = document.getElementsByTagName("input");
        var data = {_token: "{{ csrf_token() }}"};
        var menu= Array();
        var menu_field = ["name", "amount", "explanation", "requiretime"];
      
        for (var i = 0; i < allinput.length; i++) {
            if (isHidden(allinput[i]))
            {

            }
            else{
                var filedname = allinput[i].getAttribute('name');
                var filedvalue = allinput[i].value;
                data[filedname] = filedvalue;
            } 
        }
        var menugroupname = document.getElementById('menugroupname').value;
        var url = "{{ url('/menu/save') }}" + "/" + menugroupname;

        $.ajax({
            type : 'POST',
            url : url,
            data :  data,
            success: function(result){
                if(result=="true") window.location.href="{{url('/menu')}}";
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });


    }

    function isHidden(el) {
        var style = window.getComputedStyle(el);
        return ((style.display === 'none') || (style.visibility === 'hidden'))
    }
    
</script>
@endsection