<div class="left-aside desktop-view">

        <a href="{{ url('/') }}" class="iconic-logo">
            {{--<img class="common-page-logo"  src="{{url('/images/shengshilong.jpg')}} " alt="Matmix Logo" style="width: 260px">--}}
        </a>


    <div class="left-navigation">
        <ul class="list-accordion">
            <li>
                <a href="{{url('/')}}" class="{{ mla('DashboardController@index') }}">
                    <span class="nav-icon"><i class="fa fa-dashboard"></i></span>
                    <span class="nav-home">首页</span>
                </a>
            </li>
            <li>
                <a href="#" class="waves-effect">
                    <span class="nav-icon"><i class="fa fa-user"></i></span>
                    <span class="nav-label">内容管理</span>
                </a>
                <ul>
                     <li><a href="{{route('artice.A_fenlei_list') }}">内容分类</a></li>
                    <!--<li><a href="{{route('artice.A_fenlei') }}" >添加内容分类</a></li>-->
                    <li><a href="{{route('artice.A_wenzhang_list') }}">文章管理</a></li>
                    <li><a href="{{route('artice.A_wenzhang')}}">添加文章</a></li>
                </ul>
            </li>


            
            <li>
                <a href="#" class="waves-effect ">
                    <span class="nav-icon"><i class="ico-push-pin"></i></span>
                    <span class="nav-label">商品管理</span>
                </a>
                <ul>
                    <li><a href="{{ route('goods.B_lanmu_list') }}" >商品分类</a></li>
                    <li><a href="{{ route('goods.B_shuxing_list') }}">商品属性</a></li>
                    <li><a href="{{ route('goods.B_shangbin') }}">添加商品</a></li>
                    <li><a href="{{ route('goods.goodsList') }}">商品列表</a></li>
                    <li><a href="{{ route('goods.FoundSort') }}">艺术类别</a></li>
                    <li><a href="{{ route('goods.FoundSortList') }}">艺术类别列表</a></li>
                    {{--<li><a href="{{ route('goods.B_zuren_list') }}">租赁商品列表</a></li>
                    <li><a href="{{ route('goods.B_zhendou_list') }}">甄豆商品列表</a></li>
                    <li><a href="{{ route('goods.B_yijia_list') }}">议价商品列表</a></li>
                    <li><a href="{{ route('goods.B_dingzhi_list') }}">定制商品列表</a></li>
                    <li><a href="{{ route('goods.B_paimai_list') }}">拍卖商品列表</a></li>--}}
                    <!--<li><a href="{{ route('goods.B_feimai_list') }}">非卖商品列表</a></li>
                    <li><a href="{{ route('goods.B_zhuanshou_list') }}">转售商品列表</a></li>
                    <li><a href="{{ route('goods.B_xianxia_list') }}">线下商品列表</a></li>-->
                    <li><a href="{{ route('goods.B_dingdan_list') }}">直购议价商品订单列表</a></li>
                    <li><a href="{{ route('goods.B_dingdana1_list') }}">甄豆商品订单列表</a></li>
                    <li><a href="{{ route('goods.B_dingdana2_list') }}">租赁商品订单列表</a></li>
                    <li><a href="{{ route('goods.B_dingdana3_list') }}">拍卖商品订单列表</a></li>
                    <li><a href="{{ route('goods.B_dingdana4_list') }}">定制商品订单列表</a></li>
                    <li><a href="{{ route('goods.B_yimai_list') }}">已售商品列表</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect">
                    <span class="nav-icon"><i class="ico-hammer-wrench"></i></span>
                    <span class="nav-label">界面设置</span>
                </a>
                <ul>
                    <li><a href="{{ route('interface.C_huandengpian_list') }}">壁纸管理</a></li>
                    <li><a href="{{ route('interface.C_huandengpian') }}">添加壁纸</a></li>

                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect ">
                    <span class="nav-icon"><i class="ico-hammer-wrench"></i></span>
                    <span class="nav-label">用户管理</span>
                </a>
                <ul>
                    <li><a href="{{ route('manage.D_huiyuan_list') }}">会员列表</a></li>
                    <li><a href="{{ route('manage.D_yisujia_list') }}">艺术家列表</a></li>
                    <li><a href="{{ route('manage.D_yisujia') }}">添加艺术家</a></li>
                    <li><a href="{{ route('manage.D_gallery_list') }}">画廊列表</a></li>
                    <li><a href="{{ route('manage.D_gallery') }}">添加画廊</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="waves-effect ">
                    <span class="nav-icon"><i class="ico-hammer-wrench"></i></span>
                    <span class="nav-label">账户管理</span>
                </a>
                <ul>
                    <li><a href="{{ route('account.E_chongzhi') }}">充值记录</a></li>
                    <li><a href="{{ route('account.E_consumption') }}">消费记录</a></li>
                    <li><a href="{{ route('account.E_hongbao_list') }}">优惠红包</a></li>
                    <li><a href="{{ route('account.E_hongbao') }}">发送红包</a></li>
                </ul>
            </li>

           {{-- <li>
                <a href="{{ route('campus') }}" class="{{ mla('Campuscontroller@index') }}"></a>
            </li>--}}



        </ul>
    </div>
</div>
<style type="text/css">
.left-navigation a.cur {
    text-decoration: none;
    color: #ed5970;
}
</style>
<div id="current_url" style="display:none;"> {{url('/')}}/{{Request::path()}} </div>
<script>
$(function(){
    var current_url = $.trim($("#current_url").html());
    if( current_url != "" && current_url != "#" && current_url != "/" ){
//        console.log("current_url:",current_url);;
        $(".left-navigation ul ul li a").each(function(){
            var url = $.trim( $(this).attr("href") );
//            console.log("url:",url);;
            if( url == current_url ){
//                console.log("url2:",url);;
                $(this).closest("ul").prev("a").addClass("active");
                $(this).closest("ul").show();
                $(this).addClass("cur");
            }
        });
    }
});
</script>