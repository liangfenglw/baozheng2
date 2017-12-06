$('.subbutton').click(function () {
    //获取栏目
    var genre = $("#lanmu_leixing").val();
    var classify = $("#shangpin_fenlei").val();
    var artists = $("#yishujia").val();//艺术家
    var artclass = $("#artclass").val();//艺术类别
    var theme = $("#theme").val();//题材
    var CommodityName = $("input[name='CommodityName']").val();//商品名称
    var creationTime = $("input[name='creationTime']").val();//创作时间
    var ChartImg=$("input[name='ChartImg']").val();//展示图
    var thumbnail = $("input[name='thumbnail']").val();//缩略图
    var dimension = $("input[name='dimension1']").val() + "x" + $("input[name='dimension2']").val();//作品尺寸
    var ExhibitionHall = '';//画廊
    if ($('.ExhibitionHall').is(':checked')) {
        ExhibitionHall = 1;
    } else {
        ExhibitionHall = 0;
    }
    var FramedBox = $('.IarListTy').val();//是否装安装框
    var Iar_list = "";//装裱框
    var FrameSize = "";//装裱尺寸
    if (FramedBox) {
        Iar_list = $('.Iar_list').val();//装裱框
        FrameSize = $("input[name='FrameSize1']").val() + "x" + $("input[name='FrameSize2']").val();
    } else {
        Iar_list = "";
        FrameSize = "";
    }
    var guige = getInput();//获取商品规格
    //获取简介信息
    var miaoshu = editor.$txt.html();
    //获取商品详细描述
    var xiag = editor7.$txt.html();
    var lb_radio=$(':radio[name="status"]:checked').val();
    var SaveUrl="http://"+window.location.host+"/goods.SaveAddGood"


    debugger

});