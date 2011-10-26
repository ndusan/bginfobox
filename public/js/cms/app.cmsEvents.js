var App = App || {};
(function($) {
    App.CmsEvents = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
        },
        add: function() {
            
            App.Common.datepicker();
            App.Common.mce();
            App.Common.tabs();
            App.Common.jtooltip();
        },
        edit: function() {
            
            App.Common.datepicker();
            App.Common.mce();
            App.Common.tabs();
            App.Common.jtooltip();
        }
    };
})(this.jQuery);