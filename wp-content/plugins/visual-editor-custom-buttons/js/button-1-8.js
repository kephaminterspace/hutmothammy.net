// JavaScript Document

function getBaseURL () {
   return location.protocol + '//' + location.hostname + 
      (location.port && ':' + location.port) + '/';
}

(function() {
    tinymce.create('tinymce.plugins.vecb_button8', {
        init : function(ed, url) {
            ed.addButton('vecb_button8', {
                title : 'Boxtomtat',image : url+'/icons/box.png',onclick : function() {
                     ed.selection.setContent('<p class="boxtomtat">' + ed.selection.getContent() + '</p>');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('vecb_button8', tinymce.plugins.vecb_button8);
})();