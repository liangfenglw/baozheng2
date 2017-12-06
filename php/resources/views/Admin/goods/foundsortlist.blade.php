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
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a href="{{ route('goods.FoundSort') }}" class="cur">艺术类别添加</a>|<a href="{{ route('goods.FoundSortList') }}">艺术类别列表</a>|</div>
        <div class="IAMAIN_list">
            <div class="Alist">
                <form method="post" action="">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="Alist_head">
                            <th style="width: 120px;">排序</th>
                            <th style="text-align:left;text-indent: 50px">栏目名称</th>
                            <th>状态</th>
                            <th style="width: 250px;">管理操作</th>
                        </tr>
                        @if(isset($sort))
                            @foreach($sort as $k =>$v)
                                <tr class="Alist_main">
                                    <td class="IMar_list">{{$v['id']}}</td>
                                    <td style="text-align:left;text-indent: 50px">{{$v['sort_name']}}</td>
                                    <td>{{$v['whether']}}</td>
                                    <td><a href="{{route('goods.FoundSortShow')."?sort_id=".$v['id']}}"> 修改 </a>|<span data_id="{{$v['id']}}" class="dele"  > 删除</span></td>
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
            var url="{{route('goods.FoundSortDelete')}}";
            $('.dele').click(function () {
                var id =$(this).attr('data_id');
                layer.confirm('确认删除此类别', {
                    btn: ['确认','取消'], //按钮
                    title:false,
                }, function(){
                    $.ajax({
                        url: url,
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
    </script>

@endsection

@section('footer_related')


@endsection
