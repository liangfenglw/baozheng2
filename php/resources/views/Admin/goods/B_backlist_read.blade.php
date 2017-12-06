@extends('Admin.layout.main')

@section('title', '内容管理')

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
    </div>-->|
     <style type="text/css">
.dd_read_img p{ line-height: 20px; padding: 0 15px; margin: 5px 0; float: left}
.dingdan_imgs{ }
.dingdan_imgs img{ width: 90px; height: 90px; margin: 5px; float: left; }
    </style>
    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a href="{{ route('goods.B_dingdan_list') }}" class="cur">订单管理</a>|</div>
        <div class="IAMAIN" style=" width: 100%; height:auto; margin:0 25px; padding-top:30px;">
            <form method="post" action="">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                   	  <td width="29%" valign="top"><div class="dd_read_img"><img src="{{url('/images/shengshilong.jpg')}} " ><p>装裱框：<font color="red">窄边黑 </font></p><p> 留白：<font color="red">无留白</font></p></div></td>
                      <td width="70%">
                        	<div class="dd_read_right">
                                <div class="read_top">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="right">商品名称：</td>
                                            <td colspan="3"><input type="text" name="" value="" class="Iar_input"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">订单号：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">物流单号：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">商品总价：</td>
                                            <td><input type="text" name="" value="" class="Iar_list" style="width: 150px;"></td>
                                            <td align="right">待需付款：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list" style="width: 150px;"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">保证金/押金：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list" style="width: 150px;"></td>
                                            <td align="right">退还金额：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list" style="width: 150px;"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">栏目类型：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">商品分类：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">预约发货时间：</td><!--定制订单显示-->
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">签收时间：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                        </tr>
                                        <tr><!--定制订单显示-->
                                            <td align="right">定制风格：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">定制尺寸：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                        </tr>
                                        <tr><!--定制订单显示-->
                                            <td align="right">付款方式：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">待付款：</td>
                                            <td><input type="text" name="" value="" class="Iar_list" tyle="width: 150px;"></td>
                                        </tr>
                                        <tr><!--定制订单显示-->
                                            <td align="right">上传清单：</td>
                                            <td colspan="3" class="dingdan_imgs">
                                                <a href="{{url('/images/shengshilong.jpg')}}" class="fancybox" rel="fcbox"><img src="{{url('/images/shengshilong.jpg')}}" /></a>
                                                <a href="{{url('/images/c3.jpg')}}" class="fancybox" rel="fcbox"><img src="{{url('/images/c3.jpg')}}" /></a>
                                                <a href="{{url('/images/shengshilong.jpg')}}" class="fancybox" rel="fcbox"><img src="{{url('/images/shengshilong.jpg')}}" /></a>
                                            </td>
                                        </tr>
										<tr>
											<td align="right">定制联系人：</td>
											<td><input type="text" name="" value="" class="Iar_list"></td>
											<td align="right">定制联系电话：</td>
											<td><input type="text" name="" value="" class="Iar_list"></td>
										</tr>
										<tr>
											<td align="right">定制需求：</td>
											<td colspan="3"><input type="text" name="" value="" class="describe"></td>
										</tr>
                                    </table>
                                </div>
                                <div class="read_top">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="right">购买用户：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">用户手机：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">用户邮箱：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">购买时间：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">购买方式：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">当前状态：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">订单备注：</td>
                                            <td colspan="3"><input type="text" name="" value="" class="describe"></td>
                                        </tr>
                                        <tr><!--租赁订单显示-->
                                            <td align="right">租赁开始时间：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">租赁结束时间：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="read_top">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="right">发货时间：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">申请日期：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">收货人：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">联系方式：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">收货地址：</td>
                                            <td colspan="3"><input type="text" name="" value="" class="Iar_input"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">邮编：</td>
                                            <td><input type="text" name="" value="" class="Iar_list"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="read_top">
                                	<table width="100%" cellspacing="0" cellpadding="0">
                                    	<tr>
                                        	<td align="right">退单原因：</td>
                                            <td colspan="3"><input type="text" name="" value="" class="describe"></td>
                                        </tr>
                                        <tr>
                                        	<td align="right">用户上传照片：</td>
                                            <td colspan="3"><a href="{{isset($set_goods)?md52url($set_goods->Thumbnails):url('images/z_add.png')}}" target="_blank" style="width:80px; height:80px; margin:10px; float:left;"><img id="preview" src="{{isset($set_goods)?md52url($set_goods->Thumbnails):url('images/z_add.png')}}" width="80" height="80" style="display: block;" /></a>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td align="right">服务类型：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list"></td>
                                            <td align="right">退款金额：</td>
                                            <td width="300"><input type="text" name="" value="" class="Iar_list" style="width: 150px;"></td>
                                        </tr>
                                        <tr>
                                        	<td align="right">审核意见：</td>
                                            <td width="380"><label>
                                              <input type="radio" name="status" value="1">
                                              </label>
                                              同意&nbsp;&nbsp;
                                              <label>
                                              <input type="radio" name="status" value="-1">
                                              </label>
                                              不同意&nbsp;&nbsp;
                                              <label>
                                              <input type="radio" name="status" value="-2">
                                              </label>
                                              待审核
                                            </td>
                                        	<td align="right">处理方式：</td><!--点击审核同意后自动选择退款-->
                                            <td><input name="" type="checkbox" value="">退款到用户余额</td>
                                       	</tr>
                                        <tr style="height:20px;"><td colspan="4"></td></tr>
                                        <tr>
                                            <td align="right">&nbsp;</td>
                                            <td><input type="submit" name="dosubmit" class="button" value="提 交"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                      </td>
                    </tr>
              </table>
          </form>
        </div>
    </div>
    
<script>
$(function(){
	if( $(".fancybox").length>0 ){		$(".fancybox").fancybox();	}
});
</script>
        
@endsection

@section('footer_related')
    

@endsection
