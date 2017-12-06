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
    <style type="text/css">
.specifications {
    width: 45%;
    height: 100px;
}
    </style>
    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a href="{{ route('goods.B_shuxing_list') }}" class="cur">商品属性</a>|</div>
        <div class="IAMAIN">
            <form method="post" action="{{route('goods.add_specif')}}">
	<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
		<input type="hidden" name="c_id" value="{{$sort['id']}}">
                <table width="100%" cellspacing="0" cellpadding="0">
                	<tr>
                        <td align="right"><font color="red">*</font>商品类型：</td>
                        <td>

<input type="text" name="cateid" value="{{$sort['name']}}" />
						
</td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>商品属性：</td>
                        <td>
<input type="text" name="aid" value="{{$attr['arr_name']}}" />
						
</td>
                    </tr>
                    <tr>
			<input type="hidden" name="id" value="{{$sort['id']}}">
			<input type="hidden" name="attrs_id" value="{{$attr['id']}}">
                        <td align="right"><font color="red">*</font>规格项：</td>
                        <td><textarea name="format" value="" class="specifications">@if(!empty($child)){{$child}}@else暂无规格@endif</textarea><i>多项可以"豆号"分隔</i></td>
                    </tr>
                    <tr height="60px">
                        <td align="right"></td>
                        <td><input type="submit" name="dosubmit" class="button" value="提 交"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    
        
@endsection

@section('footer_related')
    
<script type="text/javascript">
        $(document).ready(function () {
            var sort = $('#good_sort option:selected').attr('data_id');
            $("input[name='sort_id']").val(sort);
        });
        function gradeChange() {
            var sort = $('#good_sort option:selected').attr('data_id');
            $("input[name='sort_id']").val(sort);
        }
     function gradeChanges() {
alert("123");
            var sorts = $('#attrs_id option:selected').attr('datas_id');

            $("input[name='attrs_id']").val(sorts);
        }
    </script> 

@endsection
