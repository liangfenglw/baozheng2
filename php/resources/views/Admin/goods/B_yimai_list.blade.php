@extends('Admin.layout.main')

@section('title', '商品管理')
@section('header_related')
    <link rel="stylesheet" href="{{ url('/css/style.css') }}" type="text/css">

    @endsection
    @section('content')
            <!--<div class="main-container">
        <div class="container-fluid">
            @include('Admin.layout.breadcrumb', [
                'title' => '添加文章',
                '' => [
                    '' => '',
                ]
            ])
            </div>
         </div>-->

    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a href="{{ route('goods.B_yimai_list') }}" class="cur">已售商品列表</a>|<a href="{{ route('goods.B_zhigou_list') }}">商品列表</a>|<a href="{{ route('goods.B_dingdan_list') }}">订单列表</a>|<a href="{{ route('goods.B_shangbin') }}">添加商品</a>|
        	<div class="Alist" style="width:50%; float:right; margin:0 -10px; line-height:3em">
                <form method="post" action="">
                    <input type="hidden" name="_token" value="">
                    <table width="" cellspacing="0" cellpadding="0" style="float: right;">
                        <tbody><tr>
                        	<td><select name="">
                        	  <option>商品名称</option>
                              <option>商品类型</option>
                        	</select></td>
                            <td><input type="text" name="keyword" value="" class="Iar_list" placeholder="搜索商品名称、商品类型"></td>
                            <td><input type="submit" name="dosubmit" class="button" value="搜 索"></td>
                        </tr> 
                    </tbody></table>
                </form>
             </div>
        </div>
        <div class="IAMAIN_list">
            <div class="Goodslist">
                 <div class="GoodsLmain">
                     <div style="height:250px; border:1px solid #eee"><img src="{{url('images/c3.jpg')}}"></div>
                     <div class="GoodsML_head"><font color="red"><p>¥99.00</p></font> <span>直购系列</span> </div>
                     <div class="GoodsML_head"><span>艺术软装</span><span style=" color:#ff0000">总库存：12件</span></div>
                     <div class="GoodsML_head">功能实木婴儿餐椅儿童餐椅 宝宝餐桌椅 可爱小熊坐垫</div>
                     <div class="Gbottom">
                     	<span>作者：肖婷婷</span>
                         <a href="">删除</a>
                         <a href="">查看详情</a>
                     </div>
                 </div>
                 <div class="GoodsLmain">
                     <div style="height:250px; border:1px solid #eee"><img src="{{url('images/c3.jpg')}}"></div>
                     <div class="GoodsML_head"><font color="red"><p>租金 ¥99.00/1年</p></font><span>艺术软装</span> <span>租赁系列</span> </div>
                     <div class="GoodsML_head">功能实木婴儿餐椅儿童餐椅 宝宝餐桌椅 可爱小熊坐垫</div>
                     <div class="Gbottom">
                     	<span>作者：肖婷婷</span>
                         <a href="">删除</a>
                         <a href="">查看详情</a>
                     </div>
                 </div>
                 <div class="GoodsLmain">
                     <div style="height:250px; border:1px solid #eee"><img src="{{url('images/c3.jpg')}}"></div>
                     <div class="GoodsML_head"><font color="red"><p>105 甄豆+¥99.00</p></font><span>甄豆系列</span> </div>
                     <div class="GoodsML_head"><span>艺术软装</span><span style=" color:#ff0000">总库存：12件</span></div>
                     <div class="GoodsML_head">功能实木婴儿餐椅儿童餐椅 宝宝餐桌椅 可爱小熊坐垫</div>
                     <div class="Gbottom">
                     	<span>作者：肖婷婷</span>
                         <a href="">删除</a>
                         <a href="">查看详情</a>
                     </div>
                 </div>
                 <div class="GoodsLmain">
                     <div style="height:250px; border:1px solid #eee"><img src="{{url('images/c3.jpg')}}"></div>
                     <div class="GoodsML_head"><span style="float: left;">艺术软装</span><span style="float: right;">议价系列</span> </div>
                     <div class="GoodsML_head">功能实木婴儿餐椅儿童餐椅 宝宝餐桌椅 可爱小熊坐垫</div>
                     <div class="Gbottom">
                     	<span>作者：肖婷婷</span>
                         <a href="">删除</a>
                         <a href="">查看详情</a>
                     </div>
                 </div>
                 <div class="GoodsLmain">
                     <div style="height:250px; border:1px solid #eee"><img src="{{url('images/c3.jpg')}}"></div>
                     <div class="GoodsML_head"><font color="red"><p>定制价格</p></font><span>定制系列</span> </div>
                     <div class="GoodsML_head">风格：肖婷婷 &nbsp;人物 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;尺寸：33*33cm(约1平尺)</div>
                     <div class="GoodsML_head">约定发货时间：2017-11-09</div>
                     <div class="Gbottom">
                        <span>作者：肖婷婷</span>
                         <a href="">删除</a>
                         <a href="">查看详情</a>
                     </div>
                 </div>
                 <div class="GoodsLmain">
                     <div style="height:250px; border:1px solid #eee"><img src="{{url('images/c3.jpg')}}"></div>
                     <div class="GoodsML_head">起拍价：<font color="red">¥99.00</font>&nbsp;&nbsp;&nbsp;&nbsp;保证金：<font color="red">¥99.00</font></div>
                     <div class="GoodsML_head"><span>艺术软装</span> <span>拍卖系列</span> <span style=" color:#ff0000">总库存：12件</span></div>
                     <div class="GoodsML_head">功能实木婴儿餐椅儿童餐椅 宝宝餐桌椅 可爱小熊坐垫</div>
                     <div class="Gbottom">
                        <span>作者：肖婷婷</span>
                         <a href="">删除</a>
                         <a href="">查看详情</a>
                     </div>
                 </div>
            </div>
        </div>
    </div>
    
@endsection
@section('footer_related')
@endsection
