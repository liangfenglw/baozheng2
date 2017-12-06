
//商品规格
	var data ={
                        data: [
                            {
                                "desc": "分类", "name": "裙子", "id": "1", "sub": [
									{
										"desc": "属性", "name": "颜色", "id": "1", "sub": [
											{"desc": "规格", "name": "白色", "id": "1", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "黑色", "id": "2", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "红色", "id": "3", "kucun": 0, "jiage": 0, "chicun": 0}
										]
									},
									{
										"desc": "属性", "name": "尺寸", "id": "2", "sub": [
											{"desc": "规格", "name": "S", "id": "4", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "M", "id": "5", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "L", "id": "6", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "XL", "id": "7", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "XLL", "id": "8", "kucun": 0, "jiage": 0, "chicun": 0}
										]
									},
									{
										"desc": "属性", "name": "布料", "id": "3", "sub": [
											{"desc": "规格", "name": "纯棉", "id": "9", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "羽绒", "id": "10", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "蝉丝", "id": "11", "kucun": 0, "jiage": 0, "chicun": 0}
										]
									},
									{
										"desc": "属性", "name": "产地", "id": "4", "sub": [
											{"desc": "规格", "name": "深圳", "id": "12", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "广州", "id": "13", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "河南", "id": "14", "kucun": 0, "jiage": 0, "chicun": 0}
										]
									}
								]
                            },
							{
								"desc": "分类", "name": "裙子", "id": "2", "sub": [
									{
										"desc": "属性", "name": "颜色", "id": "5", "sub": [
											{"desc": "规格", "name": "白色", "id": "1", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "黑色", "id": "2", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "红色", "id": "3", "kucun": 0, "jiage": 0, "chicun": 0}
										]
									},
								]
							},
							{
								"desc": "分类", "name": "裙子", "id": "5", "sub": [
									{
										"desc": "属性", "name": "颜色", "id": "5", "sub": [
											{"desc": "规格", "name": "白色", "id": "1", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "黑色", "id": "2", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "红色", "id": "3", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "黄色", "id": "4", "kucun": 0, "jiage": 0, "chicun": 0}
										]
									},
									{
										"desc": "属性", "name": "布料", "id": "3", "sub": [
											{"desc": "规格", "name": "纯棉", "id": "9", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "羽绒", "id": "10", "kucun": 0, "jiage": 0, "chicun": 0},
											{"desc": "规格", "name": "蝉丝", "id": "11", "kucun": 0, "jiage": 0, "chicun": 0}
										]
									}
								]
							}
                        ]
	}
	var data3 = data.data;
//	console.log("data3:", JSON.stringify(data3, null, "\t"));		//格式化输出json

	var dingzhi = 5;			//定制系列
	var fenlei = $("#lanmu_leixing").val();			//栏目类型
                    
	//根据 ID 和 深度 获得 名称，属性 深度为 2, 规格 深度 为 3
	function getName(num, depth) {
                        var name = "";
	//					var lei = $("#select_id_1").val();
	//					var lei = $("#lanmu_leixing").val();
                        $.each(data3, function (i, itemi) {
                            if (itemi.id == fenlei) {
                                $.each(itemi.sub, function (j, itemj) {
                                    if (depth == 2) {
                                        if (itemj.id == num) {
                                            name = itemj.name;
                                            return false;
                                        }
                                    } else if (depth == 3) {
                                        $.each(itemj.sub, function (k, itemk) {
                                            if (itemk.id == num) {
                                                name = itemk.name;
                                                return false;
                                            }
                                        });
                                    }
                                });
                            }
                        });
                        return name;
	}
	

	//栏目类型 选择事件
	$("#lanmu_leixing").change(function(){
		fenlei = $(this).val();
		//获取拼接域名地址：Admin/goods/Businessort
		var bellurl="http://"+window.location.host+"/Admin/goods/Businessort";
        $.ajax({
            type: 'POST',
            url: bellurl,
            data: {"cid":fenlei},
            dataType: "json",
            success: function (data) {
              var num=data.data.length;
              if(num >=1) {
                  $("#shangpin_fenlei").empty();
                  $("#shangpin_fenlei").append("<option>一级栏目</option>")
                  for (var i = 0; i < num; i++) {
                      var heml = "<option value=" + data.data[i].id + ">" + data.data[i].name + "</option>";
                      $("#shangpin_fenlei").append(heml);
                  }
              }
            }
        });

	/*	.empty()
			.append("<option value='x'>" + fenlei + "1</option>")
			.append("<option value='x'>" + fenlei + "2</option>")
			.append("<option value='x'>" + fenlei + "3</option>");
		$("#yishujia").empty()
			.append("<option value='x'>" + fenlei + "21</option>")
			.append("<option value='x'>" + fenlei + "22</option>")
			.append("<option value='x'>" + fenlei + "23</option>");*/
		resetGuigeList();
		resetGuigeList2();
		
		$("tbody[data-type='lx_" + fenlei + "']").show();
		$("tbody[data-type='lx_" + fenlei + "']").siblings("tbody.lx_").hide();
		
		if( fenlei == 1 || fenlei == 5 ){
			$("#guige_w").show();
		}else{
			$("#guige_w").hide();
		}
		
	});
	//栏目类型 默认选择
	$("#lanmu_leixing").val("1").trigger("change");

	
	//上传图片
	function GetUploadify3(k) {
                        cur_item_id = k; //当前规格图片id
//		console.log("k",k);
                        $('input#upfile_n').click();
                        option_n = {
                            url: "http://lingdang.laba.tw/Pic_upload",
                            type: "post",
                            data: {return_type: "string"},
                            enctype: 'multipart/form-data',
                            success: function (ret) {
                                console.log(ret)
//				console.log("cur_item_id", cur_item_id);
                                if (typeof(ret) == "string") {
                                    ret = JSON.parse(ret);
                                }
                                if (ret.sta == "1") {
                                    layer.msg('文件上传成功');
                                    $("#item_img_" + cur_item_id).attr("src", ret.data.url);
                                    $("#item_img_" + cur_item_id).attr("data-md5", ret.data.md5);
                                } else {
                                    layer.msg(ret.msg);
                                }
                            },
                            error: function (ret) {
                                layer.msg("网络错误");
                                console.log(ret);
                            },
                            clearForm: false,
                            timeout: 100000
                        };
                        $("input#upfile_n").change(function () {
                            $("#form_n").ajaxSubmit(option_n);
                            $('input#upfile_n').unbind("change");
                            $('input#upfile_n').remove();
                            var count_n = $("#form_n").attr("data");
                            count_n++;
                            $("#form_n").attr("data", count_n);
                            $("#form_n").append('<input type="file" name="file" id="upfile_n" data="' + count_n + '" />');
                        });
	}
	
	
	//显示规格列表
	function resetGuigeList() {
                        var str = "";
//						var fenlei = $("#select_id_1").val();
//						var fenlei = $("#lanmu_leixing").val();
//						console.log("fenlei",fenlei);
                        $.each(data3, function (i, itemi) {//
//							console.log("itemi.id",itemi.id);
                            if (itemi.id == fenlei) {
                                $.each(itemi.sub, function (j, itemj) {
                                    str += "<tr>";
                                    str += "<td><span>" + itemj.name + "</span>:</td>";
                                    str += "<td>";
                                    $.each(itemj.sub, function (k, itemk) {
                                        str += '<button type="button" data-spec_id="' + itemj.id + '" data-item_id="' + itemk.id + '" class="btn btn-default">' + itemk.name + '</button>';
                                        str += '<img width="35" height="35" src="/images/add-button.jpg" id="item_img_' + itemk.id + '" onclick="GetUploadify3(\'' + itemk.id + '\');">';
                                        str += '&nbsp;&nbsp;&nbsp;';
                                    });
                                    str += "</td>";
                                    str += "</tr>";
                                });
                            }
                        });
                        if (str == "") {
                            str = "<tr><td></td><td></td></tr>";
                        }
//						console.log("str",str);
                        $("#guige_list table#goods_spec_table1 tbody").html(str);
	}

	//规格列表的 规格 点击事件
	$("#goods_spec_table1 tbody").on("click", "tr td button", function () {
		$(this).toggleClass("btn-default btn-success");
		resetGuigeList2();
	});

	//显示 价格、库存 输入列表			装裱尺寸
	function resetGuigeList2() {
                        if ($("#goods_spec_table1 button.btn-success").length > 0) {
                            ajaxGetSpecInput();
                        } else {
//							var fenlei = $("#lanmu_leixing").val();
							if( fenlei == dingzhi ){
								var str1 = "<tr><th>价格</th><th>尺寸</th></tr>";
								var str2 = "<tr><td></td><td></td></tr>";
							}else{
								var str1 = "<tr><th>价格</th><th>库存</th><th>装裱尺寸</th></tr>";
								var str2 = "<tr><td></td><td></td><td></td></tr>";
							}
                            $("#spec_input_tab thead").html(str1);
                            $("#spec_input_tab tbody").html(str2);
                        }
	}

	function ajaxGetSpecInput() {
//		var spec_arr = {1:[1,2]};// 用户选择的规格数组 	  
//		spec_arr[2] = [3,4]; 
                        var spec_arr = {};// 用户选择的规格数组
                        $("#goods_spec_table1 button").each(function () {
                            if ($(this).hasClass('btn-success')) {
                                var rename = $(this).closest("td").prev("td").find("span").html();
                                var name = $(this).html();
                                var spec_id = $(this).data('spec_id');
//				var spec_id = rename;
                                var item_id = $(this).data('item_id');
//				var item_id = name;

//				console.log("spec_id:"+spec_id);
//				console.log("item_id:"+item_id);
                                if (!spec_arr.hasOwnProperty(spec_id))
                                    spec_arr[spec_id] = [];
                                spec_arr[spec_id].push(item_id);
                            }
                        });

//						console.log("spec_arr", JSON.stringify(spec_arr, null, "\t"));	//{ "颜色": [ "红色", "绿色", "黄色" ], "尺码": [  "M", "L2" ]}
                        getArr2(spec_arr);			//获得组合数组
                        getArr2Html(results);			//获得组合数组后重组html
	}

	var temp1 = [];
	var results = [];
	var indexs = {};
	//	var array = [[['颜色','白色'], ['颜色','红色'], ['颜色','黑色']], [['内存','4g'],['内存','16g']]];
	var array = [];
	var len = array.length;

	//获得组合数组
	function getArr2(obj) {
                        temp1 = [];
                        var temp2 = [];
                        for (var i in obj) {
                            temp2 = [];
                            //		console.log(i);			//颜色
                            //		console.log(obj[i]);		//["绿色", "黄色"]
                            for (var j in obj[i]) {
                                //			console.log(j);			//0
                                //			console.log(obj[i][j]);		//绿色
                                temp2.push([i, obj[i][j]]);
                            }
//			console.log("temp2:",JSON.stringify(temp2) );
                            //temp2: [["颜色","红色"],["颜色","绿色"],["颜色","黄色"]]
                            //temp2: [["尺码","M"],["尺码","L2"]]
                            temp1.push(temp2);
                        }
//						console.log("temp1:", JSON.stringify(temp1));
                        //temp1: [ [ ["颜色","红色"], ["颜色","绿色"], ["颜色","黄色"] ], [ ["尺码","M"], ["尺码","L2"] ] ]

                        array = temp1;
                        len = array.length;
                        results = [];
                        indexs = {};
                        specialSort(-1);
//		console.log( "results",JSON.stringify( results ) );
//		console.log( "results",JSON.stringify( results, null, "\t") );

                        //	return temp1;
	}

	function getArr2Html(arr) {
						var str1 = "";			//tr th
						var str2 = "";			//tr td
						var ids0 ;
						var ids ;
//						var fenlei = $("#lanmu_leixing").val();

						$.each( arr, function(i,itemi){
				//			console.log("i",i);
				//			console.log("itemi",JSON.stringify(itemi) );
							if( i==0 ){	str1 += "<tr>";	}
							str2 += "<tr class='data-tr'>";
							ids0 = "";
							ids = "";
							$.each( itemi, function(j,itemj){
				//				console.log("j",j);
				//				console.log("itemj",JSON.stringify(itemj) );
				//				console.log("itemj",JSON.stringify(itemj[0]) );
				//				console.log("itemj",JSON.stringify(itemj[1]) );
				//				if( i==0 ){	str1 += "<th>" + itemj[0] + "</th>"; }
								if( i==0 ){	str1 += "<th>" + getName( itemj[0], 2 ) + "</th>"; }
				//				str2 += "<td>" + itemj[1] + "</td>";
								str2 += "<td>" + getName( itemj[1], 3 ) + "</td>";
								if( ids0 == "" ){
									ids0 += itemj[0];
								}else{
									ids0 += "," + itemj[0];
								}
								if( ids == "" ){
									ids += itemj[1];
								}else{
									ids += "," + itemj[1];
								}
							});
							if( i==0 ){
								if( fenlei == dingzhi ){
									str1 += "<th>价格</th>";
									str1 += "<th>尺寸</th>";
									str1 += "</tr>\n";
								}else{
									str1 += "<th>价格</th>";
									str1 += "<th>库存</th>";
									str1 += "<th>装裱尺寸</th>";
									str1 += "</tr>\n";
								}
							}
							
							if( fenlei == dingzhi ){
								str2 += '<td><input class="jiage_i" data-cid="' + ids0 + '" data-gid="' + ids + '" name="item[' + ids + '][price]" value="0" /></td>';
								str2 += '<td><input class="chicun_i" data-cid="' + ids0 + '" data-gid="' + ids + '" name="item[' + ids + '][chicun]" value="0" /></td>';
								str2 += "</tr>\n";
							}else{
								str2 += '<td><input class="jiage_i" data-cid="' + ids0 + '" data-gid="' + ids + '" name="item[' + ids + '][price]" value="0" /></td>';
								str2 += '<td><input class="kucun_i" data-cid="' + ids0 + '" data-gid="' + ids + '" name="item[' + ids + '][store_count]" value="0" /></td>';
								str2 += '<td><input class="chicun_i" data-cid="' + ids0 + '" data-gid="' + ids + '" name="item[' + ids + '][chicun]" value="0" /></td>';
								str2 += "</tr>\n";
							}
				//			console.log("str1",str1);
						});

                        $("#spec_input_tab thead").html(str1);
                        $("#spec_input_tab tbody").html(str2);
                        hbdyg();
//		console.log("str2",str2);
	}


	//获得价格库存列表
	function getInput(){
						var arr = [];
						var temp = [];
//						var fenlei = $("#lanmu_leixing").val();
						
						$(".jiage_i").each(function(i){
				//			console.log("i:", i);
							var dataGid = $(this).attr("data-gid");
							var jiage = $(this).val();
							var kucun = $(this).closest("tr").find(".kucun_i").val();
							var chicun = $(this).closest("tr").find(".chicun_i").val();
							temp = dataGid.split(",");
							if( fenlei == dingzhi ){
								temp.push(jiage);
								temp.push(chicun);
							}else{
								temp.push(jiage);
								temp.push(kucun);
								temp.push(chicun);
							}
							arr.push(temp);
						});
//						console.log("arr:", JSON.stringify(arr));
						return arr;
	}
					
	$("#spec_input_tab tbody").on("keyup", "td input", function () {
		$(this)[0].value = $(this)[0].value.replace(/[^\d.]/g, "");
	});
	$("#spec_input_tab tbody").on("paste", "td input", function () {
		$(this)[0].value = $(this)[0].value.replace(/[^\d.]/g, "");
	});

	// 合并单元格
	function hbdyg() {
                        var tab = document.getElementById("spec_input_tab"); //要合并的tableID
                        var maxCol = 2, val, count, start;  //maxCol：合并单元格作用到多少列
                        maxCol = $(tab).find("th").length - 2;
//			console.log("maxCol:",maxCol);
                        if (tab != null) {
                            for (var col = maxCol - 1; col >= 0; col--) {
                                count = 1;
                                val = "";
//				for (var i = 0; i < tab.rows.length; i++) {			//与表头一样时会有问题
                                for (var i = 1; i < tab.rows.length; i++) {
                                    if (val == tab.rows[i].cells[col].innerHTML) {
                                        count++;
                                    } else {
                                        if (count > 1) { //合并
                                            start = i - count;
                                            tab.rows[start].cells[col].rowSpan = count;
                                            for (var j = start + 1; j < i; j++) {
                                                tab.rows[j].cells[col].style.display = "none";
                                            }
                                            count = 1;
                                        }
                                        val = tab.rows[i].cells[col].innerHTML;
                                    }
                                }
                                if (count > 1) { //合并，最后几行相同的情况下
                                    start = i - count;
                                    tab.rows[start].cells[col].rowSpan = count;
                                    for (var j = start + 1; j < i; j++) {
                                        tab.rows[j].cells[col].style.display = "none";
                                    }
                                }
                            }
                        }
	}
	function specialSort(start) {
                        start++;
                        if (start > len - 1) {
                            return;
                        }
                        if (!indexs[start]) {
                            indexs[start] = 0;
                        }
                        if (!(array[start] instanceof Array)) {
                            array[start] = [array[start]];
                        }
                        for (indexs[start] = 0; indexs[start] < array[start].length; indexs[start]++) {
                            specialSort(start);
                            if (start == len - 1) {
                                var temp = [];
                                for (var i = len - 1; i >= 0; i--) {
                                    if (!(array[start - i] instanceof Array)) {
                                        array[start - i] = [array[start - i]];
                                    }
                                    temp.push(array[start - i][indexs[start - i]]);
                                }
                                results.push(temp);
                            }
                        }

	}
//编辑器
	var editor = new wangEditor('texDiv');
	// 上传图片
	editor.config.uploadImgUrl = "http://"+window.location.host+"/Pic_upload";
	// 配置自定义参数
	editor.config.uploadParams = {
		_token: $(this)._token,
		user: $(this).user
	};
	// 设置 headers（举例）
	editor.config.uploadHeaders = {
		'Accept': 'text/x-json'
	};
	// 隐藏掉插入网络图片功能。该配置，只有在你正确配置了图片上传功能之后才可用。
	editor.config.hideLinkImg = false;
	editor.create();

	var editor2 = new wangEditor('texDiv2');
	editor2.create();

	var editor3 = new wangEditor('texDiv3');
	editor3.create();

	var editor4 = new wangEditor('texDiv4');
	editor4.create();

	var editor5 = new wangEditor('texDiv5');
	editor5.create();

//	var editor6 = new wangEditor('texDiv6');
//	editor6.create();

	var editor7 = new wangEditor('texDiv7');
	editor7.create();



















