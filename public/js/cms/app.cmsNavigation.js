var App = App || {};
(function($) {
    App.CmsNavigation = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
        },
        add: function(){
            App.Common.tabs();
        }, 
        edit: function(){
            App.Common.tabs();
        }
    };
})(this.jQuery);