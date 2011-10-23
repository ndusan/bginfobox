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
        }, 
        edit: function(){
            App.Common.tabs();
            App.Common.mce();
        },
        addNode: function(){
            App.Common.tabs();
            App.Common.mce();
        }, 
        editNode: function(){
            App.Common.tabs();
            App.Common.mce();
        }
    };
})(this.jQuery);