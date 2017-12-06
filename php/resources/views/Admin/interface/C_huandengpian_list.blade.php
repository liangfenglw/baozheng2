@extends('Admin.layout.main')

@section('title', '界面设置')

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
        <div class="IAhead"><strong style="padding-right: 10px;">界面设置</strong><a href="{{ route('interface.C_huandengpian_list') }}" class="cur">壁纸管理</a>|<a href="{{ route('interface.C_huandengpian') }}">添加壁纸</a>|</div>
        <div class="IAMAIN_list">
        	
            <div class="Alist">
                <form method="post" action="">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="Alist_head">
                            <th style="width: 120px;">编号</th>
                            <th>壁纸图片</th>
                            <th style="width: 180px;">管理操作</th>
                        </tr>
                        
						@if(isset($mural)&&!empty($mural))
						@foreach($mural as $k=>$v)
                        <tr class="Alist_main">
                            <td class="IMar_list"/>{{$v['id']}}</td>
                           
						    <td><img src="{{$v['m_img']}}" style="width:auto; height: 50px; margin: 5px 0;"></td>
							 <td><a href="{{ route('mural.mural_up',"id=".$v['id']."") }}">修改 </a>|<spen class="dele" data_id="{{$v['id']}}"> 删除</spen></td>
                       
                        </tr>
                        @endforeach
						@else
							 <tr class="Alist_main">
                            <td class="IMar_list"/>1</td>
                            <td><img src="{{url('images/touxiang_gg.jpg')}}" style="width:auto; height: 50px; margin: 5px 0;"></td>
                                <td><a href="">修改 </a>|<a href=""> 删除</a></td>
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
        var url="{{route('mural.mural_del')}}";
        $('.dele').click(function () {
            var id =$(this).attr('data_id');
			
            layer.confirm('确认删除此品牌', {
                btn: ['确认','取消'], //按钮
                title:false,
            }, function(){
                $.ajax({
                    url: url,
                    data: {
                        'id': id,
                        '_token': _token
                    },
                    type: 'get',
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
</script>
	
	
@endsection

@section('footer_related')
    

@endsection
