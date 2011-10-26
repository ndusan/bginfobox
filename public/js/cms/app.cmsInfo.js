var App = App || {};
(function($) {
    App.CmsInfo = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('.dataTable').dataTable();
            App.Common.thead();
            App.Common.tabs();
        },
        add: function(){
            App.Common.tabs();
            App.Common.mce();
            App.Common.jtooltip();
        }, 
        edit: function(){
            App.Common.tabs();
            App.Common.mce();
            App.Common.jtooltip();
        },
        addNode: function(){
            App.Common.tabs();
            App.Common.mce();
            App.Common.jtooltip();
        }, 
        editNode: function(){
            App.Common.tabs();
            App.Common.mce();
            App.Common.jtooltip();
        }
    };
})(this.jQuery);