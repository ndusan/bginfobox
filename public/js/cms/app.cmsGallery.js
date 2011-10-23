var App = App || {};
(function($) {
    App.CmsGallery = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
        }
    };
})(this.jQuery);