// JavaScript Document

function getBaseURL () {
   return location.protocol + '//' + location.hostname + 
      (location.port && ':' + location.port) + '/';
}

(function() {
    tinymce.create('tinymce.plugins.vecb_button7', {
        init : function(ed, url) {
            ed.addButton('vecb_button7', {
                title : 'Add titile H2',image : url+'/icons/box.png',onclick : function() {
                     ed.selection.setContent('<h2 class="addtitleh2">' + ed.selection.getContent() + '</h2>');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('vecb_button7', tinymce.plugins.vecb_button7);
})();