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
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a href="{{ route('goods.B_shuxing_list') }}" class="cur">商品属性</a>|<a href="{{ route('goods.B_shuxing') }}">添加属性</a>|<a href="{{ route('goods.B_lanmu_list') }}">商品分类</a>|</div>
        <div class="IAMAIN_list" style="margin-top:15px; margin-bottom:5px;">
        	
            <div class="Alist">
                <form method="post" action="">
                  <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="Alist_head">
                            <th style="width: 120px;">ID</th>
                            <th>商品属性</th>
                            <th>属性规格</th>
                            <th>商品类型</th>  
                            <th style="width: 250px;">管理操作</th>
                        </tr>
                        
                        
                    @if(isset($attr_list)) 
						
                     	  @foreach($attr_list as $k=>$v)
						<tr class="Alist_main">	
											 					
                            <td style="width: 120px;">{{$v['id']}}</td>
                            <td>{{$v['arr_name']}}</td>
                            <td>@if(isset($v['child'])&& !empty($v['child'])){{$v['child']}} @else暂无规格 @endif</td>
                            <td>{{$v['name']}}</td>  
                             <td><a href="{{ route('goods.B_specification',"id=".$v['id']) }}">添加规格 </a>|<a data_id="{{$v['id']}}" class="dele"> 删除</a></td>
							  </tr>
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
				var url="{{route('goods.attr_del')}}";
            $('.dele').click(function () {
                var id=$(this).attr('data_id');
//alert(id);
                layer.confirm('确认删除此分类', {
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
        @if(Session::has('msg'))
        layer.msg('{{Session::get('msg')}}');
        @endif
    </script>      
@endsection

@section('footer_related')
    

@endsection
