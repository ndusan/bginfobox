var App = App || {};
(function($) {
    App.CmsBanners = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
        },
        add: function() {
           App.Common.tabs();
           App.Common.jtooltip();
       },
       edit: function() {
           App.Common.tabs();
           App.Common.jtooltip();
       }
    };
})(this.jQuery);