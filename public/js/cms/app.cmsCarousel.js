var App = App || {};
(function($) {
    App.CmsCarousel = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
       },
       add: function() {
           App.Common.tabs();
       },
       edit: function() {
           App.Common.tabs();
       }
    };
})(this.jQuery);