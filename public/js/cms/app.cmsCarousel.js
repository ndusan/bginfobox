var App = App || {};
(function($) {
    App.CmsCarousel = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
       },
       add: function() {
           App.Common.tabs();
       },
       edit: function() {
           App.Common.tabs();
       }
    };
})(this.jQuery);