var App = App || {};
(function($) {
    App.CmsEvents = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
        },
        add: function() {
            
            App.Common.datepicker();
            App.Common.mce();
            App.Common.tabs();
        },
        edit: function() {
            
            App.Common.datepicker();
            App.Common.mce();
            App.Common.tabs();
        }
    };
})(this.jQuery);