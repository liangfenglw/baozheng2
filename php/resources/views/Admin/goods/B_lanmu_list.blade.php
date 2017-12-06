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
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a href="{{ route('goods.B_lanmu_list') }}" class="cur">商品分类管理</a>|<a href="{{ route('goods.B_lanmu') }}">添加商品分类</a>|</div>
        <div class="IAMAIN_list">
            <div class="Alist">
                <form method="post" action="">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="Alist_head">
                            <th style="width: 120px;">排序</th>
                            <th style="text-align:left;text-indent: 50px">栏目名称</th>
                            <th>栏目类型</th>
                            <th>状态</th>
                            <th style="width: 250px;">管理操作</th>
                        </tr>
                       
						       @if(isset($sort))

                              @foreach($sort as $k =>$v)
									<tr class="Alist_main">
										<td class="IMar_list">{{$v['id']}}</td>
										<td style="text-align:left;text-indent: 50px">{{$v['name']}}</td>
										 <td>{{$v['cname']}}</td>
										  <td>{{$v['whether']}}</td>
										<td><a href="{{ route('goods.B_lanmu',"id=".$v['id']."") }}">添加子栏目 </a>|<a href="{{route('goods.B_lanmu_up',"id=".$v['id']."")}}"> 修改 </a>|<span data_id="{{$v['id']}}" class="dele"  > 删除</span></td>
								   </tr>
                        @if(isset($v['child']) and $v['child']!='')
                            @foreach($v['child'] as $ky =>$vy)
                            <tr class="Alist_main">
                                  <td class="IMar_list">{{$vy['id']}}</td>
                            <td style="text-align:left;text-indent: 50px">|--{{$vy['name']}}</td>
							 <td>{{$vy['cname']}}</td>
							  <td>{{$vy['whether']}}</td>
                             <td><a href="{{route('goods.B_lanmu_up',"id=".$vy['id']."")}}""> 修改 </a>|<span data_id="{{$vy['id']}}" class="dele"> 删除</span></td>
                            </tr>
                            @endforeach
                            @endif
                        @endforeach
                    @endif
						
                    
                       

                    </table>
                </form>
            </div>
        </div>
    </div>
    
  <script type="text/javascript">
        $(function () {
            var _token = $('input[name="_token"]').val();
            var url="{{route('new.sort_del')}}";
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
