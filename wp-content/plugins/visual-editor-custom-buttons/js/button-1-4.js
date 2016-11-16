// JavaScript Document

function getBaseURL () {
   return location.protocol + '//' + location.hostname + 
      (location.port && ':' + location.port) + '/';
}

(function() {
    tinymce.create('tinymce.plugins.vecb_button4', {
        init : function(ed, url) {
            ed.addButton('vecb_button4', {
                title : 'Button4',image : 'http://thammynangnguc.vn/wp-content/uploads/vecb/btn4.png',onclick : function() {
                     ed.selection.setContent('<h3 class="addtitle4">' + ed.selection.getContent() + '</h3>');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('vecb_button4', tinymce.plugins.vecb_button4);
})();