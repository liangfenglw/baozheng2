$(function () {
    $('.subbutton').click(function () {
        //获取栏目

        var reload_url = "http://" + window.location.host + "/Admin/goods/goodsList";
        var data = {};
        data['genre'] = $("#lanmu_leixing").val();
        data['classify'] = $("#shangpin_fenlei option:selected").val();
        data['artists'] = $("#yishujia").val();//艺术家
        data['artclass'] = $("#artclass").val();//艺术类别
        data['theme'] = $("#theme").val();//题材
        data['CommodityName'] = $("input[name='CommodityName']").val();//商品名称

        data['ChartImg'] = $("input[name='ChartImg']").val();//展示图
        data['thumbnail'] = $("input[name='thumbnail']").val();//缩略图
        //获取简介信息
        data['miaoshu'] = editor.$txt.html();
        //获取商品详细描述
        data['xiag'] = editor7.$txt.html();
        data['lb_radio'] = $(':radio[name="status"]:checked').val();
        var SaveUrl = "http://" + window.location.host + "/Admin/goods/SaveAddGood";
        if (data['genre'] == "1" ) {
                var ExhibitionHall = '';//画廊
                if ($('.ExhibitionHall').is(':checked')) {
                    ExhibitionHall = 1;
                } else {
                    ExhibitionHall = 0;
                }
                data['ExhibitionHall'] = ExhibitionHall;
                data['guige'] = getInput();//获取商品规格

            data['creationTime'] = $("input[name='creationTime']").val();//创作时间
            data['dimension'] = $("input[name='dimension1']").val() + "x" + $("input[name='dimension2']").val();//作品尺寸

            data['FramedBoxty'] = $('.IarListTy').val();//是否装安装框
            var Framedbox = "";//装裱框
            var FrameSize = "";//装裱尺寸
            if ( data['FramedBoxty']) {
                Framedbox = $('.Framedbox').val();//装裱框
                FrameSize = $("input[name='FrameSize1']").val() + "x" + $("input[name='FrameSize2']").val();
            } else {
                Framedbox = "";
                FrameSize = "";
            }
            data['Framedbox'] = Framedbox;
            data['FrameSize'] = FrameSize;

        } else if(data['genre']=="3"){
            data['ZhenBeans'] = $("input[name='ZhenBeans1']").val() + "," + $("input[name='ZhenBeans2']").val();
            data['ChartImg'] = $("input[name='ChartImg']").val();//展示图
            data['thumbnail'] = $("input[name='thumbnail']").val();//缩略图
            data['inventory'] = $(".inventory").val();//库存

        }else if(data['genre']=="4"){
            data['FramedBoxty'] = $('.IarListTy2').val();//是否装安装框
            var Framedbox = "";//装裱框
            var FrameSize = "";//装裱尺寸
            if ( data['FramedBoxty']) {
                Framedbox = $('.Framedbox1').val();//装裱框
                    FrameSize = $("input[name='FrameSize3']").val() + "x" + $("input[name='FrameSize4']").val();
            } else {
                Framedbox = "";
                FrameSize = "";
            }
            data['Framedbox'] = Framedbox;
            data['FrameSize'] = FrameSize;
            data['creationTime'] = $("input[name='creationTime1']").val();//创作时间
            data['dimension'] = $("input[name='dimension3']").val() + "x" + $("input[name='dimension4']").val();//作品尺寸
            data['miaoshu'] = editor4.$txt.html();//描述
            data['inventory'] = $(".stock").val();//库存
        }else if(data['genre']=="2"){
            data['FramedBoxty'] = $('.IarListTy2').val();//是否装安装框
            var Framedbox = "";//装裱框
            var FrameSize = "";//装裱尺寸
            if ( data['FramedBoxty']) {
                Framedbox = $('.Framedbox2').val();//装裱框
                FrameSize = $("input[name='FrameSize5']").val() + "x" + $("input[name='FrameSize6']").val();
            } else {
                Framedbox = "";
                FrameSize = "";
            }
            data['Framedbox'] = Framedbox;
            data['FrameSize'] = FrameSize;
            data['creationTime'] = $("input[name='creationTime2']").val();//创作时间
            data['rent'] = $("input[name='rent']").val();//租赁价
            data['purchase'] = $("input[name='purchase']").val();//直购价
            data['leasePeriod'] =$("#leasePeriod option:selected").val();
            data['dimension'] = $("input[name='dimension5']").val() + "x" + $("input[name='dimension6']").val();//作品尺寸
            data['inventory'] = $(".inventory2").val();//库存
			data['deposit']=$(".deposit").val();//押金
			
            data['miaoshu'] = editor2.$txt.html();//描述
        }else if(data['genre']=="5"){
            data['miaoshu'] = editor5.$txt.html();//描述
            data['PaintTime']=$("input[name='PaintTime']").val();//预作画时间
            data['guige'] = getInput();//获取商品规格
        }else if(data['genre']=="6"){
            data['creationTime'] = $("input[name='creationTime3']").val();//创作时间
            data['dimension'] = $("input[name='dimension7']").val() + "x" + $("input[name='dimension8']").val();//作品尺寸
            data['FramedBoxty'] = $('.IarListTy3').val();//是否装安装框
            var Framedbox = "";//装裱框
            var FrameSize = "";//装裱尺寸
            if ( data['FramedBoxty']) {
                Framedbox = $('.Framedbox2').val();//装裱框
                FrameSize = $("input[name='FrameSize7']").val() + "x" + $("input[name='FrameSize8']").val();
            } else {
                Framedbox = "";
                FrameSize = "";
            }
            data['Framedbox'] = Framedbox;
            data['FrameSize'] = FrameSize;
            data['OpeningTime']=$("input[name='OpeningTime']").val();//开拍时间
            data['EndTime']=$("input[name='EndTime']").val();//结束时间
            data['StartPrice']=$("input[name='StartPrice']").val();//起拍价
            data['PriceIncrease']=$("input[name='PriceIncrease']").val();//涨幅价
            data['Margin']=$("input[name='Margin']").val();//保证金
            data['inventory'] = $(".inventory3").val();//库存
			
        }
        $.ajax({
            url: SaveUrl,
            data: data,
            type: 'post',
            dataType: "json",
            stopAllStart: true,
            success: function (data) {
                if (data.sta == '1') {
                    layer.msg(data.msg, {icon: 1});
                    setTimeout(window.location.href = reload_url, 1000);
                } else {
                    layer.msg(data.msg || '请求失败');
                }
            },
            error: function (data) {
                layer.msg(data.msg || '网络发生错误');
                return false;
            }
        });


    });
});