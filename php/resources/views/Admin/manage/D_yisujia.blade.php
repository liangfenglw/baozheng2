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
        <div class="IAhead"><strong style="padding-right: 10px;">用户管理</strong><a href="{{ route('manage.D_yisujia_list') }}" class="cur">艺术家</a>|</div>
        <div class="IAMAIN">
            <form method="post" action="{{route('manage.add_artist')}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
				
                <table width="100%"  cellspacing="0" cellpadding="0">
				@if (count($errors)>0)
					@foreach($errors->all() as $value)
                                <label class="error">
                                    <span class="error">{{$value}}</span>
                                </label>
								@endforeach
                            @endif
                	<tr>
                    	<td align="right" width="120"><font color="red">*</font>艺术类型：</td>
						@if(isset($artist)&&!empty($artist))
							<td><input type="type" name="art_type" value="{{$artist['art_type']}}" readonly="true"/></td>
					@else
						
                        <td><select name="art_type">
                          <option>中国女艺术家</option>
                          <option>中国男艺术家</option>
                          <option>国外艺术家</option>
                          <option>国外游学艺术家</option>
                        </select>
						
                        </td>
						@endif
                    </tr>
                    <tr>
                    	<td align="right" width="120"><font color="red">*</font>毕业院系：</td>
						    
						@if(isset($artist)&&!empty($artist))
							<td><input type="type" name="art_type" value="{{$artist['finish']}}" readonly="true"/></td>
					@else
                        <td><select name="finish">
                          <option>中央美院</option>
                          <option>清华大学美院</option>
                          <option>四川美院</option>
                          <option>广州美院</option>
                          <option>中国美院</option>
                          <option>湖北美院</option>
                          <option>西安美院</option>
                          <option>天津美院</option>
                          <option>鲁讯美院</option>
                          <option>扬州大学</option>
                          <option>德州学院</option>
                          <option>曲阜师范大学</option>
                          <option>阜阳师范学院</option>
                          <option>四川师范大学</option>
                          <option>其他院校</option>
                        </select>
                        </td>
						@endif
                    </tr>
                    <tr>
                    	<td align="right" width="120"><font color="red">*</font>艺术派系：</td>
							@if(isset($artist)&&!empty($artist))
							<td><input type="type" name="art_type" value="{{$artist['art_type']}}" readonly="true"/></td>
					@else
                        <td><select name="art_factions">
                          <option>岭南画派</option>
                          <option>扬州画派</option>
                          <option>齐鲁画派</option>
                          <option>新水墨主义</option>
                          <option>古典写实主义</option>
                          <option>写实主义</option>
                          <option>抽象主义</option>
                          <option>印象主义</option>
                          <option>其他派系</option>
                        </select>
                        </td>
						@endif
                    </tr>
                    <tr>
                        <td align="right" width="120"><font color="red">*</font>所在画馆：</td>
							@if(isset($gallery)&&!empty($gallery))
								
							<td>
								<select name="art">
								@foreach($gallery as $key=>$value)
								  <option value="{{$value['id']}}" @if(isset($artist)&&!empty($artist)&&$value['id']==$artist['art'])selected="selected"@endif>{{$value['g_name']}}</option>
								  @endforeach
								</select> 
							</td>
							@else
                        <td><select name="art">
                          <option>其他</option>
                        </select> <i>* 当选择"其他"项则默认为不属于任何画馆</i>
                        </td>
						@endif
                    </tr>
                    <tr>
					
                        <td align="right" width="120"><font color="red">*</font>艺术家姓名：</td>
						@if(isset($artist)&&!empty($artist))
							<td><input type="type" name="art_name" value="{{$artist['art_name']}}" readonly="true"/></td>
							@else
                        <td><input  type="text"  value="" name="art_name" class="Iar_list"></td>
					@endif
                    </tr> 
                   <tr>
                        <td align="right"><font color="red">*</font>头像：</td>
                        <td>
                            <div class="" style="position:relative;">
                                    <input type="file" name="file" id="doc" multiple="multiple" style="width:450px;"
                                           onchange="javascript:setImagePreview();">
                                    <input type="hidden" name="img_path" id="img" value="{{isset($artist)?md52url($artist['art_avatar']):""}}">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td>
                            <img id="preview"
                                 src=" @if(isset($artist)) {{md52url($artist['art_avatar'])}}@elseif(isset($artist['art_avatar'])) {{md52url($artist['art_avatar'])}}
								 @else url('images/z_add.png')@endif"
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
                        <td align="right" width="120"><font color="red">*</font>性别：</td>
						@if(isset($artist)&&!empty($artist))
							<td><input type="type" name="gender" value="@if($artist['gender']==1)男@else 女@endif" readonly="true"/></td>
						@else
                        <td><input type="radio" name="gender" id="boy" value="1"> 男&nbsp;&nbsp;&nbsp; <input type="radio" name="gender" id="girl" value="0"> 女</td>
					@endif
                    </tr> 
                    <tr>
					
                        <td align="right"><font color="red">*</font>手机：</td>
						@if(isset($artist)&&!empty($artist))
							<td><input type="type" name="phone" value="{{$artist['phone']}}" readonly="true"/></td>
						@else
                        <td><input  type="text" name="phone" value="" class="Iar_list"></td>
					@endif
                    </tr> 
                    <tr>
						
                        <td align="right"><font color="red">*</font>邮箱：</td>
						@if(isset($artist)&&!empty($artist))
							<td><input type="type" name="mailbox" value="{{$artist['mailbox']}}" readonly="true"/></td>
						@else
                        <td><input  type="text" name="mailbox" value="" class="Iar_list"></td>
						@endif
                    </tr> 
                    <tr>
					
                        <td align="right"><font color="red">*</font>地址：</td>
						@if(isset($artist)&&!empty($artist))
							<td><input type="type" name="address" value="{{$artist['address']}}" readonly="true"/></td>
						@else
                        <td><input  type="text" name="address" value="" class="Iar_input"></td>
					@endif
                    </tr>

					
					
					
					
					
                    <tr>
                        <td align="right"><font color="red">*</font>毕业学校：</td>
						@if(isset($artist)&&!empty($artist))
							<td><input type="type" name="g_school" value="{{$artist['g_school']}}" readonly="true"/></td>
						@else
                        <td><input  type="text" name="g_school" value="" class="Iar_input"></td>
					@endif
                    </tr> 
                     <tr>
                        <td align="right"><font color="red">*</font>背景图：</td>
                        <td>
                            <div class="" style="position:relative;">
                                    <input type="file" name="files" id="docs" multiple="multiple" style="width:450px;"
                                           onchange="javascript:setImagePreviews();">
                                    <input type="hidden" name="img_paths" id="imgs" value="{{isset($artist)?md52url($artist['art_img']):""}}">

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td>
                            <img id="previews"
                                 src=" @if(isset($artist)) {{md52url($artist['art_avatar'])}}@elseif(isset($artist['art_avatar'])) {{md52url($artist['art_avatar'])}}
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
                        <td align="right"><font color="red">*</font>个人简介：</td>
							@if(isset($artist)&&!empty($artist))
							<td><input type="type" name="synopsis" value="{{$artist['synopsis']}}" readonly="true"/></td>
						@else
                       <td><textarea name="synopsis" class="describe">个人简介编辑器</textarea></td>
                         @endif
					</tr> 
                    <tr>
                        <td align="right">状态：</td>
						@if(isset($artist)&&!empty($artist))
							<td><input type="type" name="describe" value="@if($artist['type']==1)启用@else 禁用 @endif" readonly="true"/></td>
						@else
                        <td><input type="radio" name="type" id="enable" value="1"> 启用&nbsp;&nbsp;&nbsp; <input type="radio" name="type" id="ban" value="0"> 禁止</td>
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
