// JavaScript Document

function getBaseURL () {
   return location.protocol + '//' + location.hostname + 
      (location.port && ':' + location.port) + '/';
}

(function() {
    tinymce.create('tinymce.plugins.vecb_button2', {
        init : function(ed, url) {
            ed.addButton('vecb_button2', {
                title : 'Button2',image : 'http://thammynangnguc.vn/wp-content/uploads/vecb/btn2.png',onclick : function() {
                     ed.selection.setContent('<h3 class="addtitle2">' + ed.selection.getContent() + '</h3>');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('vecb_button2', tinymce.plugins.vecb_button2);
})();