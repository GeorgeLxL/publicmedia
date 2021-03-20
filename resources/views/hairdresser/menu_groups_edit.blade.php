@extends('layouts.header1')
@section('title','menu')
@section('page-title')
    <img src="{{asset('img/menu.png')}}">
    <span class="title">メニュー</span>
@endsection

@section('script')
<script>
    function addnewmenu()
    {
        var inputs = document.getElementsByTagName('input');
        for (index = 0; index < inputs.length; ++index) {
            inputs[index].setAttribute('value', inputs[index].value);
        }
        var fieldset = document.getElementsByTagName('fieldset');
        var id = fieldset.length;
        var fieldsettag = "<fieldset class='menu_groups'><table><tbody><tr><td><input class='menu_group_input' type='text' name='menu-group-" + id + "' id='menu-group-" + id + "'></td><td><a onclick='delete_menu("+ id +")' data-object-class='menu_group' style='cursor: pointer;' class='fa fa-times remove_nested_fields_link'></a></td></tr></tbody></table></fieldset>"
        document.getElementById("menu_group_pan").innerHTML += fieldsettag;
    }

    function delete_menu(id)
    {
        var fieldset = document.getElementsByTagName('fieldset');
        var inputs = document.getElementsByTagName('input');
        inputs[id].style.display = 'none';
        fieldset[id].style.display = 'none';   
    }

    function savemenugroup()
    {
        var allinput = document.getElementsByTagName("input");
        var data = {_token: "{{ csrf_token() }}"};
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

        $.ajax({
            type : 'POST',
            url : "{{ url('/menu_groups/save') }}",
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

@section('content')
<style>
    .menu_group_input{
        margin:10px 0 10px 0;
        width:100%
    }
</style>
   
<div class="container" style="padding-bottom:30px">
    <div class="row justify-content-center">
        <div class="col-lg-11" style="padding-top: 50px;">
            <div class="card card-default" >
                <div class="card-body">
                    <form id="edit_menu_group" action="/users/update_menu_group" method="post">
                        <div id="menu_group_pan" class="menu_group_pan">
                            @php
                            $i = 0
                            @endphp
                                @foreach($menu_group as $row)
                                    <fieldset class="menu_groups">
                                        <table style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <td style="width:90%">
                                                        <input class="menu_group_input" type="text" value="{{$row->name}}" name="menu-group-{{$i}}" id="menu-group-{{$i}}">
                                                    </td>
                                                    <td>
                                                        <a onclick="delete_menu({{$i}})"  data-object-class="menu_group" style="cursor: pointer;" class="fa fa-times remove_nested_fields_link"></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @php
                                        $i++
                                        @endphp
                                    </fieldset>
                                @endforeach
                        </div>
                        <a style="color:#7B8BDC; text-decoration:none; cursor: pointer;" onclick="addnewmenu()">入力フォーム追加</a>
                        <center>
                            <a onclick="savemenugroup()" class="menu_button">保存する</a>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

