function convertItems() {
    this.url = '';
}

convertItems.prototype.setUrl = function (data) {
    this.url = data;
}
convertItems.prototype.saveSettings = function (form) {
    $.ajax({
        type: "post",
        dataType: "json",
        url: this.url + "/save_settings",
        data: form.serialize(),
        success: function (data) {
            if (data.error) {
                noty($.parseJSON('{"text":"' + data.error + '","layout":"topRight","type":"error"}'));
            }
            else {
                noty($.parseJSON('{"text":"' + data.success + '","layout":"topRight","type":"success"}'));
            }
        }
    });
}
convertItems.prototype.runConversion = function (form) {
    $.ajax({
        type: "post",
        dataType: "json",
        url: this.url + "/run/1",
        data: form.serialize(),
        success: function (data) {
            if (data.error) {
                noty($.parseJSON('{"text":"' + data.error + '","layout":"topRight","type":"error"}'));
            }
            else {
				if(data.next_page && data.next_page != -1){
					convertItems.convertNextInventories(data.next_page, form);
					noty($.parseJSON('{"text":"' + data.converted + '","layout":"topRight","type":"success"}'));
				}
                else{
					convertItems.convertWarehouses(1, form);
					noty($.parseJSON('{"text":"' + data.converted + '","layout":"topRight","type":"success"}'));
				}
            }
        }
    });
}
convertItems.prototype.convertNextInventories = function (page, form) {
    $.ajax({
        type: "post",
        dataType: "json",
        url: this.url + "/run/"+page,
        data: form.serialize(),
        success: function (data) {
            if (data.error) {
                noty($.parseJSON('{"text":"' + data.error + '","layout":"topRight","type":"error"}'));
            }
            else {
				if(data.next_page && data.next_page != -1){
					convertItems.convertNextInventories(data.next_page, form);
					noty($.parseJSON('{"text":"' + data.converted + '","layout":"topRight","type":"success"}'));
				}
                else{
					convertItems.convertWarehouses(1, form);
					noty($.parseJSON('{"text":"' + data.converted + '","layout":"topRight","type":"success"}'));
				}
            }
        }
    });
}
convertItems.prototype.convertWarehouses = function (page, form) {
    $.ajax({
        type: "post",
        dataType: "json",
        url: this.url + "/run-warehouses/"+page,
        data: form.serialize(),
        success: function (data) {
            if (data.error) {
                noty($.parseJSON('{"text":"' + data.error + '","layout":"topRight","type":"error"}'));
            }
            else {
				if(data.next_page && data.next_page != -1){
					convertItems.convertWarehouses(data.next_page, form);
					
					noty($.parseJSON('{"text":"' + data.converted + '","layout":"topRight","type":"success"}'));
				}
                else{
					noty($.parseJSON('{"text":"' + data.converted + '","layout":"topRight","type":"success"}'));
				}
            }
        }
    });
}






