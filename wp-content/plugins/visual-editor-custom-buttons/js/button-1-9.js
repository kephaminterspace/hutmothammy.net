// JavaScript Document

function getBaseURL () {
   return location.protocol + '//' + location.hostname + 
      (location.port && ':' + location.port) + '/';
}

(function() {
    tinymce.create('tinymce.plugins.vecb_button9', {
        init : function(ed, url) {
            ed.addButton('vecb_button9', {
                title : 'Noidungchinh',image : url+'/icons/box.png',onclick : function() {
                     ed.selection.setContent('<div class="noidungchinh">' + ed.selection.getContent() + '</div>');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('vecb_button9', tinymce.plugins.vecb_button9);
})();