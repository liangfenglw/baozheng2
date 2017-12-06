@extends('Admin.layout.main')

@section('title', '账户管理')

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
        <div class="IAhead"><strong style="padding-right: 10px;">账户管理</strong><a href="{{ route('account.E_hongbao_list') }}" class="cur">优惠红包</a>|</div>
        <div class="IAMAIN">
            <form method="post" action="@if(isset($reds)&&!empty($reds)){{route('red.red_edit')}}@else{{route("red.add_red")}}@endif">
                <table width="100%" cellspacing="0" cellpadding="0">
				   <input type="hidden" name="id" value="@if(isset($reds)&&!empty($reds)){{$reds['id']}}@else @endif"/>
                    <tr>
                        <td align="right"><font color="red">*</font>优惠名称：</td>
                        <td><input type="text" name="name" value="@if(isset($reds)&&!empty($reds)){{$reds['name']}}@else @endif" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>红包面额：</td>
                        <td><input type="text" name="price" value="@if(isset($reds)&&!empty($reds)){{$reds['price']}}@else @endif" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>最低消费金额：</td>
                        <td><input type="text" name="min_price" value="@if(isset($reds)&&!empty($reds)){{$reds['min_price']}}@else @endif" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>发放数量：</td>
                        <td><input type="text" name="num" value="@if(isset($reds)&&!empty($reds)){{$reds['num']}}@else @endif" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>使用起始日期：</td>
                        <td><input type="text" name="start_time" value="@if(isset($reds)&&!empty($reds)){{$reds['start_time']}}@else @endif" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>使用结束日期：</td>
                        <td><input type="text" name="end_time" value="@if(isset($reds)&&!empty($reds)){{$reds['end_time']}}@else @endif" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>状态：</td>
<!--					<td><input type="radio" name="radio" id="enable" value=""> 启用&nbsp;&nbsp;&nbsp; <input type="radio" name="radio" id="ban" value=""> 禁用</td>			-->
						<td><label class="lb_radio"><input type="radio" name="type"  @if(isset($reds)&&!empty($reds)&&$reds['type']=='1') checked="checked" @endif value="1" />启用</label>
							<label class="lb_radio"><input type="radio" name="type" @if(isset($reds)&&!empty($reds)&&$reds['type']=='0') checked="checked" @endif value="0" />禁用</label></td>
                    </tr>
                    <tr height="60px">
                        <td align="right"></td>
                        <td><input type="submit" name="dosubmit" class="button" value="提 交"></td>
                    </tr>
                </table>
            </form>
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
