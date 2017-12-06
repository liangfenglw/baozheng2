@extends('Admin.layout.main')

@section('title', '商品管理')

@section('content')
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
    <style type="text/css">
.specifications {
    width: 45%;
    height: 100px;
}
    </style>
    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a href="{{ route('goods.B_shuxing_list') }}" class="cur">商品属性</a>|</div>
        <div class="IAMAIN">
            <form method="post" action="{{route('goods.add_specif')}}">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
		<input type="hidden" name="c_id" value="{{$sort['id']}}">
                <table width="100%" cellspacing="0" cellpadding="0">
                	<tr>
                        <td align="right"><font color="red">*</font>商品类型：</td>
                        <td>

<input type="text" name="cateid" value="{{$sort['name']}}" />
						
</td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>商品属性：</td>
                        <td>
<input type="text" name="aid" value="{{$attr['arr_name']}}" />
						
</td>
                    </tr>
                    <tr>
			<input type="hidden" name="id" value="{{$sort['id']}}">
			<input type="hidden" name="attrs_id" value="{{$attr['id']}}">
                        <td align="right"><font color="red">*</font>规格项：</td>
					 <td><input type="text" name="format"  value="@if(!empty($child)){{$child}}@else暂无规格@endif" class="specifications"  /><td>
					  <tr>
                        <td align="right"><font color="red">*</font>缩略图：</td>
                        <td>
                            <div class="" style="position:relative;">
                                    <input type="file" name="file" id="doc" multiple="multiple" style="width:450px;"
                                           onchange="javascript:setImagePreview();">
                                    <input type="hidden" name="img_path" id="img" value="@if(isset($artice)){{$artice['attr_img']}}@endif">

                            </div>
                        </td>
                    </tr>
                    <tr>
					
                        <td align="right"></td>
                        <td>
                            <img id="preview"
                                 src="@if(isset($artice)&&!empty($artice)){{md52url($artice['attr_img'])}}@else url('images/z_add.png')@endif"
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
    
<script type="text/javascript">
        $(document).ready(function () {
            var sort = $('#good_sort option:selected').attr('data_id');
            $("input[name='sort_id']").val(sort);
        });
        function gradeChange() {
            var sort = $('#good_sort option:selected').attr('data_id');
            $("input[name='sort_id']").val(sort);
        }
     function gradeChanges() {
alert("123");
            var sorts = $('#attrs_id option:selected').attr('datas_id');

            $("input[name='attrs_id']").val(sorts);
        }
    </script> 

@endsection
