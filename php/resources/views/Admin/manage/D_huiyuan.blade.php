@extends('Admin.layout.main')

@section('title', '用户管理')

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
    
    <div class="Iartice" style="padding-bottom:3%; margin-bottom:0.7%;">
        <div class="IAhead"><strong style="padding-right: 10px;">用户管理</strong><a href="{{ route('manage.D_huiyuan_list') }}">会员列表</a>|<a href="{{ route('manage.D_huiyuan') }}" class="cur">会员详情</a>|</div>
        <div class="IAMAIN" style="padding-top: 40px;">
            <form method="post" action="">
                <table width="100%"  cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="right" width="120">用户名：</td>
                        <td><input  type="text"  value="" class="Iar_list"></td>
                    </tr> 
                    <tr>
                        <td align="right" width="120">昵称：</td>
                        <td><input  type="text"  value="" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right">头像：</td>
                        <td>
							<div class="" style="position:relative;">
								<form method="get" action="xznetwork" name="textfile"> <input type="file" name="file" id="doc" multiple="multiple" style="width:450px;" onchange="javascript:setImagePreview();"></form>
							</div>
						</td>
                    </tr>
					<tr>
						<td align="right"></td>
						<td>							
							<img id="preview" src="{{isset($set_goods)?md52url($set_goods->Thumbnails):url('images/z_add.png')}}" width="100" height="100" style="display: block;" />
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
                    } catch(e) {
                        alert("您上传的图片格式不正确，请重新选择!");
                        return false;
                    }
                    imgObjPreview.style.display = 'none';
                    document.selection.empty();
                }
                return true;
            }
        </script>
                    <tr>
                        <td align="right">昵称：</td>
                        <td><input  type="text"  value="" class="Iar_list"></td>
                    </tr> 
                    <tr>
                        <td align="right" width="120"><font color="red">*</font>性别：</td>
                        <td><input type="radio" name="radio" id="boy" value="boy"> 男&nbsp;&nbsp;&nbsp; <input type="radio" name="radio" id="girl" value="girl"> 女</td>
                    </tr> 
                    <tr>
                        <td align="right">手机：</td>
                        <td><input  type="text"  value="" class="Iar_list"></td>
                    </tr> 
                    <tr>
                        <td align="right">邮箱：</td>
                        <td><input  type="text"  value="" class="Iar_list" /></td>
                    </tr> 
                    <tr>
                        <td align="right">账户余额：</td>
                        <td><input  type="text"  value="" class="Iar_inpun" style="margin-right: 10px;"><font color="red">元</font></td>
                    </tr> 
                    <tr>
                        <td align="right">甄豆：</td>
                        <td><input  type="text"  value="" class="Iar_inpun"></td>
                    </tr> 
                    <tr>
                        <td align="right">默认收货地址：</td>
                        <td><input  type="text"  value="" class="Iar_input"></td>
                    </tr> 
                    <!--<tr>
                        <td align="right">默认租售地址：</td>
                        <td><input  type="text"  value="" class="Iar_input"></td>
                    </tr> -->
                    <tr>
                        <td align="right">状态：</td>
                        <td><input type="radio" name="radio" id="enable" value=""> 启用&nbsp;&nbsp;&nbsp; <input type="radio" name="radio" id="ban" value=""> 禁止</td>
                    </tr>
                    
                    <tr height="60px">
                        <td align="right"></td>
                        <td><input type="submit" name="dosubmit" class="button" value="提 交"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    
    <div class="Iartice" style="margin-top:0.7%;">
        <div class="IAhead"><strong style="padding-right: 10px; ;">财务明细</strong>
        	<div class="Alist" style="width:50%; float:right; margin:0 -10px; line-height:3em">
                <form method="post" action="">
                    <input type="hidden" name="_token" value="">
                    <table width="" cellspacing="0" cellpadding="0" style="float: right;">
                        <tbody><tr>
                        	<td><select name="">
                        	  <option>订单号</option>
                              <option>消费类型</option>
                              <option>消费名称</option>
                        	</select></td>
                            <td><input type="text" name="keyword" value="" class="Iar_list" placeholder="搜索订单号、消费类型、消费名称"></td>
                            <td><input type="submit" name="dosubmit" class="button" value="搜 索"></td>
                        </tr> 
                    </tbody></table>
                </form>
            </div>
        </div>
        <div class="IAMAIN_list">
            <div class="Alist">
                <form method="post" action="">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="Alist_head">
                            <th style="width:200px;">日期</th>
                            <th style="width:220px;">订单号</th>
                            <th style="width:220px;">消费类型</th>
                            <th>订单名称/消费账号</th>
                            <th>状态</th>
                            <th>金额</th>
                        </tr>
                        
                        <tr class="Alist_main">
                            <td class="IMar_list"/>2016.8.18</td>
                            <td>24r34f66</td>
                            <td>充值</td>
                            <td>12245687565454</td>
                            <td>完成</td>
                            <td><font color="red">￥0.0</font></td>
                        </tr>
                        <tr class="Alist_main">
                            <td class="IMar_list"/>2016.8.18</td>
                            <td>24r34f66</td>
                            <td>提现</td>
                            <td>12245687565454</td>
                            <td>未完成</td>
                            <td><font color="red">￥0.0</font></td>
                        </tr>
                        <tr class="Alist_main">
                            <td class="IMar_list"/>2016.8.18</td>
                            <td>24r34f66</td>
                            <td>订单消费</td>
                            <td>12245687565454</td>
                            <td>未完成</td>
                            <td><font color="red">￥0.0</font></td>
                        </tr>
                        <tr class="Alist_main">
                            <td class="IMar_list"/>2016.8.18</td>
                            <td>24r34f66</td>
                            <td>商品退款</td>
                            <td>特步</td>
                            <td>未完成</td>
                            <td><font color="red">￥0.0</font></td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
    </div>
        
@endsection

@section('footer_related')
    

@endsection
