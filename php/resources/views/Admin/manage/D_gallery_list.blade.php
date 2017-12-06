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
    
    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">用户管理</strong><a href="{{ route('manage.D_gallery_list') }}" class="cur">画廊管理</a>|<a href="{{ route('manage.D_gallery') }}">添加画廊</a>|<a href="{{ route('manage.D_yisujia_list') }}">艺术家</a>|</div>
        <div class="IAMAIN_list" style="margin-top:15px; margin-bottom:5px;">
        	<div class="Alist">
                <form method="post" action="">
                    <input type="hidden" name="_token" value="">
                    <table width="" cellspacing="0" cellpadding="0" style="float: right; margin-right: 30px;">
                        <tbody><tr>
                        	<td><select name="">
                        	  <option>画廊名称</option>
                        	</select></td>
                            <td><input type="text" name="keyword" value="" class="Iar_list" placeholder="搜索画廊名称"></td>
                            <td><input type="submit" name="dosubmit" class="button" value="搜 索"></td>
                        </tr> 
                    </tbody></table>
                </form>
            </div>
            <div class="Alist">
                <form method="post" action="">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="Alist_head">
                        	<th style="width: 70px;">UID</th>
                            <th style="width: 200px;">画廊名称</th>  
                            <th>联系人</th>
                            <th style="width: 200px;">手机</th>
                            <th style="width: 200px;">邮箱</th>
                            <th>地址</th>
                            <th>作品数</th>
                            <th>状态</th>
                            <th style="width: 100px;">管理操作</th>
                        </tr>
                        @if(isset($gallery_lists) &&!empty($gallery_lists))
							@foreach($gallery_lists as $k=>$v)
                        <tr class="Alist_main">
                            <td class="IMar_list"/>{{$v['id']}}</td>
                            <td>{{$v['g_name']}}</td>
                            <td>{{$v['g_people']}}</td>
                            <td>{{$v['g_phone']}}</td>
                            <td>{{$v['g_mailbox']}}</td>
                            <td>{{$v['g_address']}}</td>
                            <td>120</td>
                            <td>@if($v['type']==1)启用@else禁用@endif</td>
                            <td><a href="{{ route('manage.D_gallery',"id=".$v['id'])}}">查看</a></td>
                        </tr>
						@endforeach
                        @else
						<tr class="Alist_main">
                            <td class="IMar_list"/>15</td>
                            <td>画廊名称</td>
                            <td>肖婷婷</td>
                            <td>13711174990</td>
                            <td>1171801173@qq.com</td>
                            <td>安徽省-蚌埠市-禹会区</td>
                            <td>120</td>
                            <td>启用</td>
                            <td><a href="{{ route('manage.D_gallery') }}">查看</a></td>
                        </tr>
						@endif
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
