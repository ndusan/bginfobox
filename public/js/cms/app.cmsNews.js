var App = App || {};
(function($) {
    App.CmsNews = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
        },
        add: function(){
            App.Common.mce();
        }, 
        edit: function(){
            App.Common.mce();
        }
    };
})(this.jQuery);