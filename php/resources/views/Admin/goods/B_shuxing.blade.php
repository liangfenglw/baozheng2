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
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a href="{{ route('goods.B_shuxing_list') }}" class="cur">商品属性</a>|</div>
        <div class="IAMAIN">
         
            <form method="post" action="{{route('goods.add_attr')}}">
			<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
                <table width="100%" cellspacing="0" cellpadding="0">
                	<tr>
                        <td align="right"><font color="red">*</font>商品分类：</td>
                        <td>
					
						<select name="cateid" id="good_sort" onchange="gradeChange()">
                                <option data_id="0">作为一级分类</option>
                              	  @if(isset($sort))
                                    @foreach($sort as $key =>$vel)
                                        <option  data_id="{{$vel['id']}}" >{{$vel['name']}}</option>
                                    @endforeach
                                @endif

                            </select>
						
                    </tr>
                    <tr>
					<input type="hidden" name="sort_id" value="">
					<input type="hidden" name="pid" value="">
                        <td align="right"><font color="red">*</font>属性名称：</td>
                        <td><input type="text" name="sort_name" value="" class="Iar_input"></td>
                         @if (count($errors)>0)
							 @foreach($errors->all() as $value)
                                <label class="error">
                                    <span class="error">{{ $value }}</span>
                                </label>
								@endforeach
                            @endif
                    </tr>
                    <tr>
                        <td align="right">排列顺序：</td>
                        <td><input type="text" name="sort_num" value="" class="Iar_inpun"/></td>
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
    
    </script> 
@endsection
