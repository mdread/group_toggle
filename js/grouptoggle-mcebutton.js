(function() {
    tinymce.create('tinymce.plugins.quote', {
        init : function(ed, url) {
            ed.addButton('group_toggle', {
                title : 'GroupToggle',
                image : url+'/image.png',
                onclick : function() {
                     ed.selection.setContent('[group_toggle]' + ed.selection.getContent() + '[/group_toggle]');

                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('group_toggle', tinymce.plugins.quote);
})();
