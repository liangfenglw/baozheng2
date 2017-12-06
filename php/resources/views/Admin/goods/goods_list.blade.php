@extends('Admin.layout.main')

@section('title', '商品管理')
@section('header_related')
    <link rel="stylesheet" href="{{ url('/css/style.css') }}" type="text/css">

@endsection
@section('content')
    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a
                    href="{{ route('goods.B_zhendou_list') }}" class="cur">甄豆商品列表</a>|<a
                    href="{{ route('goods.B_shangbin') }}">添加商品</a>|<a
                    href="{{ route('goods.B_yimai_list') }}">已售商品列表</a>|
            <div class="Alist" style="width:50%; float:right; margin:0 -10px; line-height:3em">
                <form method="get" action="{{route('goods.goodsList')}}">
                    <input type="hidden" name="_token" value="">
                    <table width="" cellspacing="0" cellpadding="0" style="float: right;">
                        <tbody>
                        <tr >
                            <td>
                                <select name="series" id="mySelect1">
                                    <option value="0">商品类型</option>
                                </select>
                            </td>
                            <td>
                                <select name="assort" id="mySelect2">
                                    <option value="0">商品分类</option>
                                </select>
                            </td>
                            <td><input type="text" name="keyword" value="" class="Iar_list" placeholder="搜索商品名称、商品分类">
                            </td>
                            <td><input type="submit" name="dosubmit" class="button" value="搜 索"></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="IAMAIN_list">
            <div class="Goodslist">
               @if(isset($SelectData))
                   @foreach($SelectData as $ky =>$vl )
                        <div class="GoodsLmain"  >
                            <div style="height:250px; border:1px solid #eee"><img src="{{md52url($vl['thumbnail'])?:url('images/c3.jpg')}}"></div>
                            <div class="GoodsML_head">
                                @if($vl['column_id']=="3")
                                    <font color="red" style="margin-right:5px;">105 甄豆</font>+
                                    <font color="red" style="margin-left:5px;">¥99.00</font>@else ￥ 元@endif<span>{{$vl['good_name']}}</span>

                                @if($vl['column_id']=="2" || $vl['column_id']=="3" || $vl['column_id']=="4" || $vl['column_id']=="6") <span style=" color:#ff0000">总库存：{{$vl['inventory']}}件</span>@endif
                            </div>
                            <div class="GoodsML_head">{{$vl['ommodity_Readme']}}</div>
                            <div class="Gbottom" >
                                <span>作者：{{$vl['art_name']}}</span>
                                <a class="delgoods" data_id="{{$vl['id']}}" >删除</a>
                                <a href="{{route('goods.show',$vl['id'])}}">查看详情</a>
                            </div>
                        </div>
                       @endforeach
                   @else
                    <div class="GoodsLmain">
                        <div style="height:250px; border:1px solid #eee"><img src="{{url('images/c3.jpg')}}"></div>
                        <div class="GoodsML_head"><font color="red" style="margin-right:5px;">105 甄豆</font>+<font
                                    color="red" style="margin-left:5px;">¥99.00</font><span>艺术软装</span> <span
                                    style=" color:#ff0000">总库存：12件</span></div>
                        <div class="GoodsML_head">功能实木婴儿餐椅儿童餐椅 宝宝餐桌椅 可爱小熊坐垫</div>
                        <div class="Gbottom">
                            <span>作者：肖婷婷</span>
                            <a href="">删除</a>
                            <a href="">查看详情</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var _token="{{csrf_token()}}";
    </script>
    <script type="text/javascript" src="/js/business/goodslist.js"></script>
@endsection
@section('footer_related')
@endsection
