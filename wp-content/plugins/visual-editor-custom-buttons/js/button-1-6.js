// JavaScript Document

function getBaseURL () {
   return location.protocol + '//' + location.hostname + 
      (location.port && ':' + location.port) + '/';
}

(function() {
    tinymce.create('tinymce.plugins.vecb_button6', {
        init : function(ed, url) {
            ed.addButton('vecb_button6', {
                title : 'Button6',image : 'http://thammynangnguc.vn/wp-content/uploads/vecb/btn6.png',onclick : function() {
                     ed.selection.setContent('<h3 class="addtitle6">' + ed.selection.getContent() + '</h3>');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('vecb_button6', tinymce.plugins.vecb_button6);
})();