var App = App || {};
(function($) {
    App.CmsAboutUs = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
        },
        add: function(){
            App.Common.mce();
            App.Common.tabs();
            App.Common.jtooltip();
        }, 
        edit: function(){
            App.Common.mce();
            App.Common.tabs();
            App.Common.jtooltip();
        }
    };
})(this.jQuery);