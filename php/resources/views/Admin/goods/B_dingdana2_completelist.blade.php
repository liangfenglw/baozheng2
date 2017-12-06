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
    
    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong>
            <a href="{{ route('goods.B_dingdana2_list') }}">订单列表</a>|
            <a href="{{ route('goods.B_dingdana2_completelist') }}" class="cur">已完成</a>|
            <a href="{{ route('goods.B_dingdana2_deliverylist') }}">已发货</a>|
            <a href="{{ route('goods.B_dingdana2_Nodeliverylist') }}">未发货</a>|
            <a href="{{ route('goods.B_dingdan_rented') }}">正租用</a>|
            <a href="{{ route('goods.B_dingdan_backlist') }}">退款订单</a>|
        </div>
        <div class="IAMAIN_list" style="margin-top:15px; margin-bottom:5px;">
        	<div class="Alist">
                <form method="post" action="">
                    <input type="hidden" name="_token" value="">
                    <table width="" cellspacing="0" cellpadding="0" style="float: right; margin-right: 30px;">
                        <tbody><tr>
                        	<td><select name="">
                        	  <option>订单号</option>
                              <option>商品类型</option>
                              <option>商品名称</option>
                        	</select></td>
                            <td><input type="text" name="keyword" value="" class="Iar_list" placeholder="搜索订单号、商品类型、商品名称"></td>
                            <td><input type="submit" name="dosubmit" class="button" value="搜 索"></td>
                        </tr> 
                    </tbody></table>
                </form>
            </div>
            <div class="Alist">
                <form method="post" action="">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="Alist_head">
                        	<th style="width: 120px;">订单号</th>
                            <th>商品名称</th>  
                            <th style="width: 110px;">商品类型</th>
                            <th style="width: 130px;">购买用户</th>
                            <th style="width: 130px;">购买总价</th>
                            <th style="width: 100px;">租押金</th>
                            <th style="width: 100px;">返还金额</th>
                            <th style="width: 130px;">验收时间</th>
                            <th style="max-width: 250px;">收货地址</th>
                            <th style="width: 100px;">验收状态</th>
                            <th>备注</th>
                            <th style="width: 100px;">管理操作</th>
                        </tr>
                        
                        <tr class="Alist_main">
                            <td class="IMar_list"/>1dfs5654445</td>
                            <td>安徽省-蚌埠市-禹会区</td>
                            <td>直购系列</td>
                            <td>1171801173</td>
                            <td><font color="red">￥99.00/12月</font></td>
                            <td><font color="red">￥99.00</font></td>
                            <td><font color="red">￥99.00</font></td>
                            <td>2017-07-19</td>
                            <td>安徽省-蚌埠市-禹会区</td>
                            <td>良好</td>
                            <td>订单备注</td>
                            <td><a href="{{ route('goods.B_dingdan_read') }}">查看</a></td>
                        </tr>
                        
                    </table>
                </form>
            </div>
        </div>
    </div>
    
  <script type="text/javascript">
        $(function () {
            var _token = $('input[name="_token"]').val();
            $('.support_dele').click(function () {
                var id=$(this).attr('data_id');
                layer.confirm('确认删除此分类', {
                    btn: ['确认','取消'], //按钮
                    title:false,
                }, function(){
                    $.ajax({
                        url: "{{'sort.destroy'}}",
                        data: {
                            'id': id,
                            '_token': _token
                        },
                        type: 'post',
                        dataType: "json",
                        stopAllStart: true,
                        success: function (data) {
                            if (data.sta == '1') {
                                layer.msg(data.msg, {icon: 1});
                                setTimeout(window.location.reload(), 1000);
                            } else {
                                layer.msg(data.msg || '请求失败');
                            }
                        },
                        error: function () {
                            layer.msg(data.msg || '网络发生错误');
                            return false;
                        }
                    });
                }, function(){
                    layer.msg('取消成功',{icon: 1});
                });
            });
        });
        @if(Session::has('msg'))
        layer.msg('{{Session::get('msg')}}');
        @endif
    </script>      
@endsection

@section('footer_related')
    

@endsection
