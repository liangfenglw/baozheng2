define("tpl/shop_ip.html", [], '<div class="widget-block"><form role="form" class="form-horizontal shipp-address" action="" method="post"> <input name="_token" type="hidden" value="<%=_token %>"> <input name="user_id" type="hidden" value="<%=_data.user_id %>"><div class="form-group"> <label class="col-md-2 control-label">收货人</label><div class=" col-md-9"> <input name="name" type="text" value="<%=_data.name %>" class="form-control" placeholder=""></div></div><div class="form-group area-form"> <label class="col-lg-2 control-label">收货地址</label><div class="col-lg-8 store-address"><div style="padding-left: 0;" class="col-lg-4 lc-SelNet-item"> <select name="province" class="form-control"><option value="-1">请选择省份</option></select></div><div class="col-lg-4 lc-SelNet-item"> <select name="city" class="form-control"><option value="-1">请选择城市</option></select></div><div class="col-lg-4 lc-SelNet-item"> <select name="county" class="form-control"><option value="-1">请选择区县</option></select></div></div></div><div class="form-group"> <label class="col-md-2 control-label">详细地址</label><div class=" col-md-9"> <input name="address" value="<%=_data.address %>" type="text" class="form-control" placeholder=""></div></div><div class="form-group"><div class="col-md-6" style="padding-left: 7px"> <label class="col-md-4 control-label" style="padding-left: 0">手机号码</label><div class=" col-md-8"> <input name="mobile_phone" value="<%=_data.mobile_phone %>" type="number" class="form-control" placeholder=""></div></div><div class="col-md-6" style="padding-left: 0"> <label class="col-md-4 control-label">固定电话</label><div class=" col-md-8"> <input name="tel_phone" value="<%=_data.tel_phone %>" type="text" class="form-control" placeholder=""></div></div></div></form></div>');