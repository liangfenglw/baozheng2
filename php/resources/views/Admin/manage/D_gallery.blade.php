@extends('Admin.layout.main')

@section('title', '用户管理')

@section('content')
	<script src="{{ url('/css/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('/css/distpicker.data.js') }}"></script>
	<script src="{{ url('/css/distpicker.js') }}"></script>

<link rel="stylesheet" href="{{ url('/css/style.css') }}" type="text/css">
    <!--<div class="main-container">
        <div class="container-fluid">
            @include('Admin.layout.breadcrumb', [
                'title' => '用户管理',
                'breadcrumb' => [
                '用户中心' => '',
                    '用户管理' => ''
                ]
            ])
        </div>
    </div>-->
    
    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">用户管理</strong><a href="{{ route('manage.D_gallery_list') }}" class="cur">画廊</a>|</div>
        <div class="IAMAIN">
            <form method="post" action="{{route('manage.add_gallery')}}">
			<input type="hidden" name="_token" value="<?php echo  csrf_token();?>"/>
                <table width="100%"  cellspacing="0" cellpadding="0">
                	
						@if (count($errors)>0)
					@foreach($errors->all() as $value)
                                <label class="error">
                                    <span class="error">{{$value}}</span>
                                </label>
								@endforeach
                            @endif
					
					
                    <tr>
                        <td align="right" width="120"><font color="red">*</font>画廊名称：</td>
									@if(isset($gallery)&&!empty($gallery))
                        <td><input  type="text" name="g_name" value="{{$gallery['g_name']}}" class="Iar_list" readonly="true"></td>
					@else
						<td><input  type="text" name="g_name" value="" class="Iar_list"></td>
					@endif
                    </tr> 
                    <tr>
                        <td align="right"><font color="red">*</font>画廊主页展示图：</td>
                        <td>
                            <div class="" style="position:relative;">
                                    <input type="file" name="files" id="docs" multiple="multiple" style="width:450px;"
                                           onchange="javascript:setImagePreviews();">
                                    <input type="hidden" name="img_paths" id="imgs" value="{{isset($gallery)?md52url($gallery['g_homeimg']):""}}">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td>
                            <img id="previews"
                                 src=" @if(isset($gallery)) {{md52url($gallery['g_homeimg'])}}@elseif(isset($gallery['g_homeimg'])) {{md52url($gallery['g_homeimg'])}}
								 @else url('images/z_add.png')@endif"
                                 width="100" height="100" style="display: block;"/>
                        </td>
                    </tr>
					
					  <script type="text/javascript">


                        //下面用于图片上传预览功能
                        function setImagePreviews(avalue) {
                            //input
                            var docObj = document.getElementById("docs");
//img
                            var imgObjPreview = document.getElementById("previews");
                            //div
                            var divs = document.getElementById("localImag");
                            if (docObj.files && docObj.files[0]) {
                                //火狐下，直接设img属性
                                imgObjPreview.style.display = 'block';
                                imgObjPreview.style.width = '100px';
                                imgObjPreview.style.height = '100px';
                                //imgObjPreview.src = docObj.files[0].getAsDataURL();
                                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
                                imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
                            } else {
                                //IE下，使用滤镜
                                docObj.select();
                                var imgSrc = document.selection.createRange().text;
                                var localImagId = document.getElementById("localImag");
                                //必须设置初始大小
                                localImagId.style.width = "100px";
                                localImagId.style.height = "100px";
                                //图片异常的捕捉，防止用户修改后缀来伪造图片
                                try {
                                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                                } catch (e) {
                                    alert("您上传的图片格式不正确，请重新选择!");
                                    return false;
                                }
                                imgObjPreview.style.display = 'none';
                                document.selection.empty();
                            }
                            var Upload = "{{url('upload')}}";
                            var data = new FormData();
                            //为FormData对象添加数据
                            $.each($('#docs')[0].files, function (i, file) {
                                data.append('_token',"{{csrf_token()}}");
                                data.append('file', file);
                            });
                            $.ajax({
                                url: Upload,
                                type: 'POST',
                                data: data,
                                cache: false,
                                dataType: "json",
                                contentType: false,    //不可缺
                                processData: false,    //不可缺
                                success: function (data) {
                                    //$img.attr('src', data.url);
                                    document.getElementById("imgs").value = data.md5;
                                },
                                error:function (data) {

                                }
                            });

                            //document.getElementById("img").value = imgObjPreview.src;
                            return true;
                        }
                    </script>
                    <tr>
                        <td align="right"><font color="red">*</font>联系人：</td>
									@if(isset($gallery)&&!empty($gallery))
                        <td><input  type="text" name="g_people" value="{{$gallery['g_people']}}" class="Iar_list" readonly="true"></td>
					@else
						<td><input  type="text" name="g_people" value="" class="Iar_list"></td>
						@endif
                    </tr> 
                    <tr>
                        <td align="right"><font color="red">*</font>手机：</td>
						@if(isset($gallery)&&!empty($gallery))
                        <td><input  type="text" name="g_phone"  value="{{$gallery['g_people']}}" class="Iar_list" readonly="true"></td>
					@else
						<td><input  type="text" name="g_phone"  value="" class="Iar_list"></td>
						@endif
                    </tr> 
                    <tr>
                        <td align="right"><font color="red">*</font>邮箱：</td>
							@if(isset($gallery)&&!empty($gallery))
                        <td><input  type="text" name="g_mailbox"  value="{{$gallery['g_mailbox']}}" class="Iar_list" readonly="true"></td>
					@else
						 <td><input  type="text" name="g_mailbox"  value="" class="Iar_list"></td>
						@endif
                    </tr> 
                    <tr>
                        <td align="right"><font color="red">*</font>画廊地址：</td>
							@if(isset($gallery)&&!empty($gallery))
                        <td><input  type="text" name="g_address" value="{{$gallery['g_address']}}" class="Iar_input" readonly="true"></td>
					@else
						<td><input  type="text" name="g_address" value="" class="Iar_input"></td>
						@endif
                    </tr> 
					
					
					
					 <tr>
                        <td align="right"><font color="red">*</font>地址图片：</td>
                        <td>
                            <div class="" style="position:relative;">
                                    <input type="file" name="g_addressimg" id="address" multiple="multiple" style="width:450px;"
                                           onchange="javascript:setImagePreviewsimg();">
                                    <input type="hidden" name="addressimg" id="address_img" value="{{isset($artist)?md52url($artist['g_addressimg']):""}}">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td>
                            <img id="g_address"
                                 src=" @if(isset($artist)) {{md52url($artist['g_addressimg'])}}
								 @else url('images/z_add.png')@endif"
                                 width="100" height="100" style="display: block;"/>
                        </td>
                    </tr>
					
					  <script type="text/javascript">


                        //下面用于图片上传预览功能
                        function setImagePreviewsimg(avalue) {
                            //input
                            var docObj = document.getElementById("address");
//img
                            var imgObjPreview = document.getElementById("g_address");
                            //div
                            var divs = document.getElementById("localImag");
                            if (docObj.files && docObj.files[0]) {
                                //火狐下，直接设img属性
                                imgObjPreview.style.display = 'block';
                                imgObjPreview.style.width = '100px';
                                imgObjPreview.style.height = '100px';
                                //imgObjPreview.src = docObj.files[0].getAsDataURL();
                                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
                                imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
                            } else {
                                //IE下，使用滤镜
                                docObj.select();
                                var imgSrc = document.selection.createRange().text;
                                var localImagId = document.getElementById("localImag");
                                //必须设置初始大小
                                localImagId.style.width = "100px";
                                localImagId.style.height = "100px";
                                //图片异常的捕捉，防止用户修改后缀来伪造图片
                                try {
                                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                                } catch (e) {
                                    alert("您上传的图片格式不正确，请重新选择!");
                                    return false;
                                }
                                imgObjPreview.style.display = 'none';
                                document.selection.empty();
                            }
                            var Upload = "{{url('upload')}}";
                            var data = new FormData();
                            //为FormData对象添加数据
                            $.each($('#address')[0].files, function (i, file) {
                                data.append('_token',"{{csrf_token()}}");
                                data.append('file', file);
                            });
                            $.ajax({
                                url: Upload,
                                type: 'POST',
                                data: data,
                                cache: false,
                                dataType: "json",
                                contentType: false,    //不可缺
                                processData: false,    //不可缺
                                success: function (data) {
                                    //$img.attr('src', data.url);
                                    document.getElementById("address_img").value = data.md5;
                                },
                                error:function (data) {

                                }
                            });

                            //document.getElementById("img").value = imgObjPreview.src;
                            return true;
                        }
                    </script>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
     <tr>
                        <td align="right"><font color="red">*</font>缩略图：</td>
                        <td>
                            <div class="" style="position:relative;">
                                    <input type="file" name="file" id="doc" multiple="multiple" style="width:450px;"
                                           onchange="javascript:setImagePreview();">
                                    <input type="hidden" name="img_path" id="img" value="{{isset($gallery)?md52url($gallery['bg_img']):""}}">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td>
                            <img id="preview"
                                 src=" @if(isset($gallery)) {{md52url($gallery['bg_img'])}}@elseif(isset($gallery['bg_img'])) {{md52url($gallery['bg_img'])}} @else url('images/z_add.png')@endif"
                                 width="100" height="100" style="display: block;"/>
                        </td>
                    </tr>
					
					  <script type="text/javascript">


                        //下面用于图片上传预览功能
                        function setImagePreview(avalue) {
                            //input
                            var docObj = document.getElementById("doc");
//img
                            var imgObjPreview = document.getElementById("preview");
                            //div
                            var divs = document.getElementById("localImag");
                            if (docObj.files && docObj.files[0]) {
                                //火狐下，直接设img属性
                                imgObjPreview.style.display = 'block';
                                imgObjPreview.style.width = '100px';
                                imgObjPreview.style.height = '100px';
                                //imgObjPreview.src = docObj.files[0].getAsDataURL();
                                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
                                imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
                            } else {
                                //IE下，使用滤镜
                                docObj.select();
                                var imgSrc = document.selection.createRange().text;
                                var localImagId = document.getElementById("localImag");
                                //必须设置初始大小
                                localImagId.style.width = "100px";
                                localImagId.style.height = "100px";
                                //图片异常的捕捉，防止用户修改后缀来伪造图片
                                try {
                                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                                } catch (e) {
                                    alert("您上传的图片格式不正确，请重新选择!");
                                    return false;
                                }
                                imgObjPreview.style.display = 'none';
                                document.selection.empty();
                            }
                            var Upload = "{{url('upload')}}";
                            var data = new FormData();
                            //为FormData对象添加数据
                            $.each($('#doc')[0].files, function (i, file) {
                                data.append('_token',"{{csrf_token()}}");
                                data.append('file', file);
                            });
                            $.ajax({
                                url: Upload,
                                type: 'POST',
                                data: data,
                                cache: false,
                                dataType: "json",
                                contentType: false,    //不可缺
                                processData: false,    //不可缺
                                success: function (data) {
                                    //$img.attr('src', data.url);
                                    document.getElementById("img").value = data.md5;
                                },
                                error:function (data) {

                                }
                            });

                            //document.getElementById("img").value = imgObjPreview.src;
                            return true;
                        }
                    </script>
                    <tr>
                        <td align="right"><font color="red">*</font>画廊介绍：</td>
							@if(isset($gallery)&&!empty($gallery))
                       <td><textarea name="g_synopsis" class="describe" readonly=true>{{$gallery['g_synopsis']}}</textarea></td>
				   @else
					       <td><textarea name="g_synopsis" class="describe">画廊介绍编辑器</textarea></td>
				   @endif
                    </tr> 
                    <tr>
                        <td align="right">状态：</td>
								@if(isset($gallery)&&!empty($gallery))
                        	<td><input type="text" name="type" id="enable" value="@if($gallery['type']=='1') 启用 @else 禁止 @endif" readonly="true" ></td>
					@else
						<td><input type="radio" name="type" id="enable" value="1"> 启用&nbsp;&nbsp;&nbsp; <input type="radio" name="type" id="ban" value="0" > 禁止</td>
					
						@endif
                    </tr>
                    
                    <tr height="60px">
                        <td align="right"></td>
                        <td><input type="submit" name="dosubmit" class="button" value="提 交"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    
        
@endsection

@section('footer_related')
    

@endsection
