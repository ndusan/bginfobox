var App = App || {};
(function($) {
    App.CmsNews = {
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
        }, 
        edit: function(){
            App.Common.mce();
            App.Common.tabs();
        }
    };
})(this.jQuery);