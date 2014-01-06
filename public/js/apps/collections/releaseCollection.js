define(['jquery', 'backbone','models/releaseModel'],function ($, Backbone, releaseModel) {
var ReleaseCollection = Backbone.Collection.extend({
        model : releaseModel,
        url: 'http://192.168.0.58/backbone/example-7/index.php?action=get',
});
return ReleaseCollection;
});