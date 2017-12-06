$(function () {



    $('#mySelect1').change(function(){

          var p1=$(this).children('option:selected').val();//这就是selected的值
          if(p1 >= "1"){
              //获取所有商品类型
              var bellurl="http://"+window.location.host+"/Admin/goods/Businessort";
              $.ajax({
                  type: 'post',
                  url: bellurl,
                  data: {"cid":p1},
                  dataType: "json",
                  success: function (data) {
                      var num=data.data.length;
                      $('#mySelect2').empty();
                      $('#mySelect2').append("<option value='0'>商品分类</option>");
                      if(num >=1) {
                          for (var i = 0; i < num; i++) {
                              var heml = "<option value=" + data.data[i].id + ">" + data.data[i].name + "</option>";
                              $("#mySelect2").append(heml);
                          }
                      }
                  },
              });
          }

          });
    function mySelect1() {
        //获取所有商品类型
        var bellurl="http://"+window.location.host+"/Admin/goods/Businessort";
        $.ajax({
            type: 'post',
            url: bellurl,
            data: {"mySelect1":"1"},
            dataType: "json",
            success: function (data) {
                var num=data.data.length;
                if(num >=1) {
                    for (var i = 0; i < num; i++) {
                        var heml = "<option value=" + data.data[i].id + ">" + data.data[i].name + "</option>";
                        $("#mySelect1").append(heml);
                    }
                }
            }
        });
    }
    mySelect1();
    $('.delgoods').click(function(){
        var banessID=$(this).attr("data_id");
        var delUrl='http://'+window.location.host+"/Admin/goods/delbesness";
        layer.confirm('您是否确认删除？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            //确认动作
            $.ajax({
                url: delUrl,
                data: {
                    banessID:banessID,
                    _token:_token
                },
                type: 'post',
                dataType: "json",
                stopAllStart: true,
                success: function (data) {
                    if (data.sta == '1') {
                        layer.msg(data.msg, {icon: 1});
                        setTimeout(window.location.reload, 2000);
                    } else {
                        layer.msg(data.msg || '请求失败');
                    }
                },
                error: function (data) {
                    layer.msg(data.msg || '网络发生错误');
                    return false;
                }
            });

            layer.msg('的确很重要', {icon: 1});
        }, function(){
            //取消动作
            /* layer.msg('也可以这样', {
                 time: 20000, //20s后自动关闭
                 btn: ['明白了', '知道了']
             });*/
        });

    });
});