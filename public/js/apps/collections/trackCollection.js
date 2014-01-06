define(['jquery', 'backbone','models/trackModel'],function ($, Backbone, trackModel) {
var trackCollection = Backbone.Collection.extend({
        model : trackModel,
        url: 'http://192.168.0.58/backbone/example-7/index.php?action=get',
});
return trackCollection;
});