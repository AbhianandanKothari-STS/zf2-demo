define(['backbone'],function (Backbone) {
var trackModel = Backbone.Model.extend({
	defaults:{
			track_id :'0',
			track_name : 'test track'
		}
	});
return trackModel;
});