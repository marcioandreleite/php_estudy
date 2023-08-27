function monsterKill() {
    this.url = '';
}

monsterKill.prototype.setUrl = function (data) {
    this.url = data;
}
monsterKill.prototype.saveSettings = function (form) {
	
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
monsterKill.prototype.populateRanking = function (server, monster) {
	if (monster != 'all') {
		dataToSend = '&' + $.param({'server': server, 'npc': monster});
	}
	else{
		dataToSend = '&' + $.param({'server': server});
	}
	$.ajax({
		type: 'POST',
		url: this.url + '/load_ranking_data',
		data: dataToSend,
		beforeSend: function () {
			App.showLoader();
		},
		complete: function () {
			App.hideLoader();
		},
		success: function (data) {
			if (data.error) {
				App.notice(App.lc.translate('Error').fetch(), 'error', data.error);
			}
			else {
				EJS.config({cache: false});
				var template = new EJS({url: DmNConfig.base_url + 'assets/plugins/js_templates/rank_monster_kill'}).render(data);
				$("#plugin_rankings_content_" + server).html(template);
				$('#top_list').show();
			}
		}
	});
}







