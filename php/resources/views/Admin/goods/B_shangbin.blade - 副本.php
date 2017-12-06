@extends('Admin.layout.main')

@section('title', '内容管理')

@section('content')

    <link rel="stylesheet" href="{{ url('/js/wangEditor/dist/css/wangEditor.min.css') }}" type="text/css">
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
        </div>-->|

    <div class="Iartice">
        <div class="IAhead"><strong style="padding-right: 10px;">商品管理</strong><a
                    href="{{ route('goods.B_zhigou_list') }}" class="cur">商品列表</a>|
        </div>
        <div class="IAMAIN">
            <form method="post" action="{}">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td align="right"><font color="red">*</font>栏目类型：</td>
                        @if(isset($column) && !empty($column))
                            <td><select name="column_id" id="lanmu_leixing">
                                    @foreach($column as $k=>$v)
                                        <option value="{{$v['id']}}">{{$v['name']}}</option>
                                    @endforeach
                                </select></td>
                        @else
                            <td><select name="lanmu_leixing" id="lanmu_leixing">
                                    <option value="1">直购系列</option>
                                    <option value="2">租赁系列</option>
                                    <option value="3">甄豆系列</option>
                                    <option value="4">议价系列</option>
                                    <option value="5">定制系列</option>
                                    <option value="6">拍卖系列</option>
                                </select></td>
                        @endif
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>商品分类：</td>
                        @if( !empty($sort))
                            <td>
                                <select name="class_id" id="shangpin_fenlei">
                                    <option>一级栏目</option>
                                    {{-- @foreach($sort as $k=>$v)

                                         <option value="{{$v['id']}}">{{$v['name']}}</option>
                                         @if(isset($v['child']) && !empty($v['child']))
                                             @foreach($v['child'] as $key=>$val)
                                                 <option value="{{$val['id']}}">|--{{$val['name']}}</option>
                                             @endforeach
                                         @endif
                                     @endforeach--}}
                                </select>
                            </td>
                        @else
                            <td>
                                <select name="class_id" id="shangpin_fenlei">
                                    <option>一级栏目</option>
                                </select>
                            </td>
                        @endif
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>艺术家：</td>
                        @if(isset($artist) && !empty($artist))
                            <td><select name="artist_id" id="yishujia">
                                    @foreach($artist as $k=>$v)
                                        <option value={{$v['id']}}>{{$v['art_name']}}</option>
                                    @endforeach
                                </select></td>
                        @else
                            <td><select name="yishujia" id="yishujia">
                                    <option>艺术家列表</option>
                                </select></td>
                        @endif
                    </tr>
                    <tr>
                        <td align="right" width="120"><font color="red">*</font>艺术类别：</td>
                        <td width="180">
                            <div style="float:left;">
                                <select name="" id="artclass">
                                    <option>全部</option>
                                    <option value="国画">国画</option>
                                    <option value="油画">油画</option>
                                    <option value="版画">版画</option>
                                    <option value="雕塑">雕塑</option>
                                    <option value="水彩">水彩</option>
                                    <option value="其他">其他</option>
                                </select>
                            </div>
                            <div style="margin-left:20px; float:left;"><font color="red">*</font>题材：
                                <select name="" id="theme">
                                    <option>全部</option>
                                    <option value="抽象">抽象</option>
                                    <option value="书法">书法</option>
                                    <option value="山水">山水</option>
                                    <option value="风景">风景</option>
                                    <option value="工笔">工笔</option>
                                    <option value="写意">写意</option>
                                    <option value="静物">静物</option>
                                    <option value="花鸟">花鸟</option>
                                    <option value="人物">人物</option>
                                    <option value="动物">动物</option>
                                    <option value="其他">其他</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>商品名称：</td>
                        <td><input type="text" name="CommodityName" value="" class="Iar_input"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>缩略图：</td>
                        <td>
                            <div class="" style="position:relative;">
                                <form method="get" action="xznetwork" name="textfile"><input type="file" name="file"
                                                                                             id="doc"
                                                                                             multiple="multiple"
                                                                                             style="width:450px;"
                                            {{-- onchange="javascript:setImagePreview();"--}}>
                                    <input name="thumbnail" type="hidden" value="" >
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td>
                            <img id="preview"
                                 src="{{isset($set_goods)?md52url($set_goods->Thumbnails):url('images/z_add.png')}}"
                                 width="100" height="100" style="display: block;"/>

                        </td>
                    </tr>

                    <script type="text/javascript">
                        //下面用于图片上传预览功能
                        function setImagePreview(avalue) {
                            //input
                            var docObj = document.getElementById("doc");
//img
                            var imgObjPreview = document.getElementById("preview");
                            //div
                            var divs = document.getElementById("localImag");
                            if (docObj.files && docObj.files[0]) {
                                //火狐下，直接设img属性
                                imgObjPreview.style.display = 'block';
                                imgObjPreview.style.width = '100px';
                                imgObjPreview.style.height = '100px';
                                //imgObjPreview.src = docObj.files[0].getAsDataURL();
                                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
                                imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
                            } else {
                                //IE下，使用滤镜
                                docObj.select();
                                var imgSrc = document.selection.createRange().text;
                                var localImagId = document.getElementById("localImag");
                                //必须设置初始大小
                                localImagId.style.width = "100px";
                                localImagId.style.height = "100px";
                                //图片异常的捕捉，防止用户修改后缀来伪造图片
                                try {
                                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                                } catch (e) {
                                    alert("您上传的图片格式不正确，请重新选择!");
                                    return false;
                                }
                                imgObjPreview.style.display = 'none';
                                document.selection.empty();
                            }
                            return true;
                        }
                    </script>

                    <tr>
                        <td align="right" width="120"><font color="red">*</font>展示图：</td>
                        <td align="center" style="padding-top:10px; float:left;">
                            <form method="get" action="xznetwork" name="textfile">
                                <input type="file" id="DisplayChart"
                                       {{-- id="Show"--}} multiple="multiple"
                                       style="width:450px;"
                                        {{--onchange="javascript:setImageShow();"--}}>
                                <input type="hidden" name="ChartImg" class="ChartImg" value="">
                            </form>
                        </td>
                    <tr>
                        <td align="right" width="120">&nbsp;</td>
                        <td id="localShow"></td>
                    </tr>
                    </tr>
                    <script type="text/javascript">
                        $(function () {
                            $("#DisplayChart").change(function () {
                                var Upload = "{{url('upload')}}";
                                var formData = new FormData();
                                formData.append('file', $('#DisplayChart')[0].files[0]);
                                formData.append('_token', '{{csrf_token()}}');
                                $.ajax({
                                    url: Upload,
                                    type: 'POST',
                                    cache: false,
                                    data: formData,
                                    processData: false,
                                    contentType: false
                                }).done(function (res) {
                                    $(".ChartImg").val(res.md5);
                                    var sethtml = '<td width="100px;"><img id="preview1" src="' + res.url + '" style="margin: 0px 5px; border: 1px solid rgb(238, 238, 238); display: block; width: 100px; height: 100px;"></td>';
                                    $("#localShow").html(sethtml);
                                }).fail(function (res) {
                                });
                            });
                            $("#doc").change(function () {
                                var Upload = "{{url('upload')}}";
                                var formData = new FormData();
                                formData.append('file', $('#doc')[0].files[0]);
                                formData.append('_token', '{{csrf_token()}}');
                                $.ajax({
                                    url: Upload,
                                    type: 'POST',
                                    cache: false,
                                    data: formData,
                                    processData: false,
                                    contentType: false
                                }).done(function (res) {

                                    $('#thumbnail').val(res.md5);
                                    $("#preview").attr('src',res.url);


                                }).fail(function (res) {
                                });
                            });
                        });
                    </script>


                    <script language="javascript" type="text/javascript">
                        var i = 1;

                        //下面用于图片上传预览功能
                        function setImageShow(avalue) {
                            html = "<td width='100px;'><img id='preview" + i + "'  src='{{isset($set_goods)?md52url($set_goods->Thumbnails):url('images/z_add.png')}}' style='margin:0 5px;border: 1px solid #eee; '/></td>"
                            $("#localShow").append(html);
                            //input
                            var docObj = document.getElementById("Show");
                            //img
                            var imgObjPreview = document.getElementById("preview" + i);
                            //div
                            var divs = document.getElementById("localShow");
                            if (docObj.files && docObj.files[0]) {
                                //火狐下，直接设img属性
                                imgObjPreview.style.display = 'block';
                                imgObjPreview.style.width = '100px';
                                imgObjPreview.style.height = '100px';
                                //imgObjPreview.src = docObj.files[0].getAsDataURL();
                                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
                                imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
                                i++;
                            } else {
                                debugger
                                //IE下，使用滤镜
                                docObj.select();
                                var imgSrc = document.selection.createRange().text;
                                var localImagId = document.getElementById("localShow");
                                //必须设置初始大小
                                localImagId.style.width = "100px";
                                localImagId.style.height = "100px";
                                //图片异常的捕捉，防止用户修改后缀来伪造图片
                                try {
                                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
                                } catch (e) {
                                    alert("您上传的图片格式不正确，请重新选择!");
                                    return false;
                                }
                                imgObjPreview.style.display = 'none';
                                document.selection.empty();
                                i++;
                            }
                            return true;
                        }
                    </script>
                    </tbody>

                    <!--直购系列-->
                    <tbody class="zhigou lx_" data-type="lx_1" style="display:table-row-group;">
                    <tr>
                        <td align="right">商品属性：</td>
                        <td><input name="" class="ExhibitionHall" type="checkbox" value=""/> 画馆展厅&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>创作时间：</td>
                        <td><input type="text" name="" value="" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>作品尺寸：</td>
                        <td><input type="text" name="dimension1" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text"
                                                                                                       name="dimension2" value=""
                                                                                                       class="Iar_inpun">
                            <i>作品宽*高（cm）</i></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>装裱状态：</td>
                        <td><select name="" class="IarListTy">
                                <option value="0">未装裱</option>
                                <option value="1">已装裱</option>
                            </select></td>
                    </tr>
                    <tr><!--选择已装裱显示，未装裱隐藏-->
                        <td align="right"><font color="red">*</font>装裱框：</td>
                        <td><input type="text" name="" value="" class="Iar_list"></td>
                    </tr>
                    <tr><!--选择已装裱显示，未装裱隐藏-->
                        <td align="right"><font color="red">*</font>装裱尺寸：</td>
                        <td><input type="text" name="FrameSize1" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text"
                                                                                                       name="FrameSize2" value=""
                                                                                                       class="Iar_inpun">
                            <i>作品装裱后宽*高（cm）</i></td>
                    </tr>
                    <!-- 规格	-->

                    <tr>
                        <td align="right">商品自述：</td>
                        <td>    <!--	<textarea name="" class="describe">框架编辑器</textarea>	-->
                            <div id="texDiv" class="texDiv" style="height:400px;max-height:500px;">
                                <p>请输入内容...</p>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                    <!--租赁系列-->
                    <tbody class="zuren lx_" data-type="lx_2" style="display:none;">
                    <tr>
                        <td align="right"><font color="red">*</font>创作时间：</td>
                        <td><input type="text" name="" value="" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>作品尺寸：</td>
                        <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text"
                                                                                                       name="" value=""
                                                                                                       class="Iar_inpun">
                            <i>作品宽*高（cm）</i></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>装裱状态：</td>
                        <td><select name="">
                                <option>未装裱</option>
                                <option>已装裱</option>
                            </select></td>
                    </tr>
                    <tr><!--选择已装裱显示，未装裱隐藏-->
                        <td align="right"><font color="red">*</font>装裱框：</td>
                        <td><input type="text" name="" value="" class="Iar_list"></td>
                    </tr>
                    <tr><!--选择已装裱显示，未装裱隐藏-->
                        <td align="right"><font color="red">*</font>装裱尺寸：</td>
                        <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text"
                                                                                                       name="" value=""
                                                                                                       class="Iar_inpun">
                            <i>作品装裱后宽*高（cm）</i></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>租赁价：</td>
                        <td>
                            <div style="margin-right:20px; float:left;"><input type="text" name="" value=""
                                                                               class="Iar_inpun" placeholder=" 直购价"
                                                                               style="margin-right: 10px;"><font
                                        color="red">元</font></div>
                            <div style="float:left;"><input type="text" name="" value="" class="Iar_inpun"
                                                            placeholder=" 租金" style="margin-right: 10px;"></div>
                            <div style="float:left;"><select name="" style="width: 60px;">
                                    <option>1月</option>
                                    <option>2月</option>
                                    <option>3月</option>
                                    <option>4月</option>
                                    <option>5月</option>
                                    <option>6月</option>
                                    <option>7月</option>
                                    <option>8月</option>
                                    <option>9月</option>
                                    <option>11月</option>
                                    <option>12月</option>
                                </select></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>库存量：</td>
                        <td><input type="text" name="" value="" class="Iar_inpun"></td>
                    </tr>
                    <tr>
                        <td align="right">商品自述：</td>
                        <td>    <!--	<textarea name="" class="describe">框架编辑器</textarea>	-->
                            <div id="texDiv2" class="texDiv" style="height:400px;max-height:500px;">
                                <p>请输入内容...</p>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                    <!--甄豆系列-->
                    <tbody class="zhendou lx_" data-type="lx_3" style="display:none;">
                    <tr>
                        <td align="right"><font color="red">*</font>甄豆价：</td>
                        <td>
                            <div style="margin-right:10px; float:left;"><input type="text" name="" value=""
                                                                               class="Iar_inpun" placeholder=" 甄豆"
                                                                               style="margin-right: 10px;">+
                            </div>
                            <div style="float:left;"><input type="text" name="" value="" class="Iar_inpun"
                                                            placeholder=" 甄豆价" style="margin-right: 10px;"><font
                                        color="red">元</font></div>
                        </td>
                    <tr>
                        <td align="right"><font color="red">*</font>库存量：</td>
                        <td><input type="text" name="" value="" class="Iar_inpun"></td>
                    </tr>
                    </tr>
                    <tr>
                        <td align="right">商品自述：</td>
                        <td>    <!--	<textarea name="" class="describe">框架编辑器</textarea>	-->
                            <div id="texDiv3" class="texDiv" style="height:400px;max-height:500px;">
                                <p>请输入内容...</p>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                    <!--议价系列-->
                    <tbody class="yijia lx_" data-type="lx_4" style="display:none;">
                    <tr>
                        <td align="right"><font color="red">*</font>创作时间：</td>
                        <td><input type="text" name="creationTime" value="" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>作品尺寸：</td>
                        <td><input type="text" name="dimension1" value="" class="Iar_inpun">&nbsp;--&nbsp;<input
                                    type="text" name="dimension2" value=""
                                    class="Iar_inpun">
                            <i>作品宽*高（cm）</i></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>装裱状态：</td>
                        <td><select name="">
                                <option>未装裱</option>
                                <option>已装裱</option>
                            </select></td>
                    </tr>
                    <tr><!--选择已装裱显示，未装裱隐藏-->
                        <td align="right"><font color="red">*</font>装裱框：</td>
                        <td><input type="text" name="" value="" class="Iar_list"></td>
                    </tr>
                    <tr><!--选择已装裱显示，未装裱隐藏-->
                        <td align="right"><font color="red">*</font>装裱尺寸：</td>
                        <td><input type="text" name="FrameSize1" value="" class="Iar_inpun">&nbsp;--&nbsp;<input
                                    type="text"
                                    name="FrameSize2" value=""
                                    class="Iar_inpun">
                            <i>作品装裱后宽*高（cm）</i></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>库存量：</td>
                        <td><input type="text" name="" value="" class="Iar_inpun"></td>
                    </tr>
                    <tr>
                        <td align="right">商品自述：</td>
                        <td>    <!--	<textarea name="" class="describe">框架编辑器</textarea>	-->
                            <div id="texDiv4" class="texDiv" style="height:400px;max-height:500px;">
                                <p>请输入内容...</p>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                    <!--定制系列-->
                    <tbody class="dingzhi lx_" data-type="lx_5" style="display:none;">

                    <!--	规格	-->

                    <tr>
                        <td align="right"><font color="red">*</font>预计作画发货时间：</td>
                        <td><input type="text" name="" value="" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right">商品自述：</td>
                        <td>    <!--	<textarea name="" class="describe">框架编辑器</textarea>	-->
                            <div id="texDiv5" class="texDiv" style="height:400px;max-height:500px;">
                                <p>请输入内容...</p>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                    <!--拍卖系列-->
                    <tbody class="dingzhi lx_" data-type="lx_6" style="display:none;">
                    <tr>
                        <td align="right"><font color="red">*</font>创作时间：</td>
                        <td><input type="text" name="" value="" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>作品尺寸：</td>
                        <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text"
                                                                                                       name="" value=""
                                                                                                       class="Iar_inpun">
                            <i>作品宽*高（cm）</i></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>装裱状态：</td>
                        <td><select name="">
                                <option>未装裱</option>
                                <option>已装裱</option>
                            </select></td>
                    </tr>
                    <tr><!--选择已装裱显示，未装裱隐藏-->
                        <td align="right"><font color="red">*</font>装裱框：</td>
                        <td><input type="text" name="" value="" class="Iar_list"></td>
                    </tr>
                    <tr><!--选择已装裱显示，未装裱隐藏-->
                        <td align="right"><font color="red">*</font>装裱尺寸：</td>
                        <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;--&nbsp;<input type="text"
                                                                                                       name="" value=""
                                                                                                       class="Iar_inpun">
                            <i>作品装裱后宽*高（cm）</i></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>起拍价：</td>
                        <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;&nbsp;<font color="red">元</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>涨幅价：</td>
                        <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;&nbsp;<font color="red">元</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>保证金：</td>
                        <td><input type="text" name="" value="" class="Iar_inpun">&nbsp;&nbsp;<font color="red">元</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>开拍时间：</td>
                        <td><input type="text" name="" value="" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>结束时间：</td>
                        <td><input type="text" name="" value="" class="Iar_list"></td>
                    </tr>
                    <tr>
                        <td align="right"><font color="red">*</font>库存量：</td>
                        <td><input type="text" name="" value="" class="Iar_inpun"></td>
                    </tr>
                    </tbody>

                    <tbody id="guige_w">
                    <tr>
                        <td align="right"><font color="red">*</font>商品规格：</td>
                        <td>
                            <div id="guige">
                                <div id="guige_list">

                                    <table class="table table-border2" id="goods_spec_table1">
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>

                            <div id="goods_spec_table2">
                                <table class="table table-border2" id="spec_input_tab">
                                    <thead>
                                    <tr>
                                        <th>价格</th>
                                        <th>库存</th>
                                        <th>装裱尺寸</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </td>
                    </tr>
                    </tbody>

                    <tbody>
                    <tr>
                        <td align="right"><font color="red">*</font>商品详情：</td>
                        <td>    <!--	<textarea name="" class="describe">框架编辑器</textarea>	-->
                            <div id="texDiv7" class="texDiv" style="height:400px;max-height:500px;">
                                <p>请输入内容...</p>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td align="right"><font color="red">*</font>状态：</td>
                        <td><label class="lb_radio"><input type="radio" checked name="status" value="1"/>发布</label>
                            <label class="lb_radio"><input type="radio" name="status" value="0"/>禁用</label></td>
                    </tr>

                    <tr height="60px">
                        <td align="right"></td>
                        <td>
                            <input type="submit" name="dosubmit" class="subbutton" value="提 交"></td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <div id="upload_pic" style="display:none;">
        <form id="form_n" action="" method="post" style="" data="0">
            {{csrf_field()}}
            <input type="file" name="file" id="upfile_n" data="0"/>
        </form>
    </div>
    <script type="text/javascript">
        var _token = '{{csrf_token()}}';
        var user = '{{Auth::id()}}';
    </script>
    <script type="text/javascript" src="/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="/js/wangEditor/dist/js/wangEditor.min.js"></script>
    <script type="text/javascript" src="/js/business/shangbin.js"></script>
    <script type="text/javascript" src="/js/business/save.js"></script>
@endsection
@section('footer_related')
@endsection
