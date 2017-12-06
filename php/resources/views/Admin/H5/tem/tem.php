<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>详情</title>
    <!-- viewport 视图窗口，移动端特殊的标签  -->
    <!-- 设置宽度为设备的宽度，默认不缩放，不允许用户缩放，在网页加载时隐藏地址栏与导航栏（iOS7.1 新增） -->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui" />
    <!-- 是否启动webapp功能，会删除默认的苹果工具栏和菜单栏 -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- 当启动webapp功能时，显示手机信号、时间、电池的顶部导航栏的颜色。默认值为default（白色），可以定为black（黑色）和black-translucent（灰色半透明）。这个主要是根据实际的页面设计的主体色为搭配来进行设置。 -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- 其他meta -->
    <!-- 启用360浏览器的极速模式(webkit) -->
    <meta name="renderer" content="webkit">
    <!-- 避免IE使用兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- uc强制竖屏 -->
    <meta name="screen-orientation" content="portrait">
    <!-- QQ强制竖屏 -->
    <meta name="x5-orientation" content="portrait">
    <!-- UC强制全屏 -->
    <meta name="full-screen" content="yes">
    <!-- QQ强制全屏 -->
    <meta name="x5-fullscreen" content="true">
    <!-- UC应用模式 -->
    <meta name="browsermode" content="application">
    <!-- QQ应用模式 -->
    <meta name="x5-page-mode" content="app">
    <!-- UC禁止自动缩放文字大小 -->
    <meta name="wap-font-scale" content="no">
</head>
<style type="text/css">
*{
	margin: 0;
	padding: 0;
}
.content{
	 width: 100%;
	 height: auto;

}
.zp
{
	width: 100%;
	height: 30px;
	float: left;
}
.nx{

display: inline-block;
width: 50%;
height: 30px;
float: left;

}
.gg{
display: inline-block;
width: 50%;
height: 30px;
float:right;
}
.lx{
	width: 100%;
	height: 30px;
	float: left;
}
.img{
 width: 100%;
 height: auto;
}
.img img{
 width: 100%;
 height: auto;	
}
.wz{
	
width: 96%;
	 height: auto;
	 margin: 20px auto 0;
	 text-indent:2em;
	 line-height: 50px; 
	 font-size: 120%;

}
</style>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function(){
     //do something
	
})
</script>

<body>
	<div class="content">
	
       <div class="zp">作品名称：<?php echo $id;?></div>   
        <span class="nx">创作年限:<?php echo $time_date?></span>
        <span class="gg">作品规格:<?php echo $work_size."cm"?></span>
        <div class="lx">作品类型:<?php echo $lx?></div>
        <div class="img">
            <img src="<?php echo $thumbnail; ?>">
        </div>
        <div class="wz"><?php echo $particulars;?></div>
	</div>
	


</body>
</html>