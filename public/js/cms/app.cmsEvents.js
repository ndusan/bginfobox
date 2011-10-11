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
        },
        edit: function() {
            
            App.Common.datepicker();
            App.Common.mce();
        }
    };
})(this.jQuery);