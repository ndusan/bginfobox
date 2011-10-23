var App = App || {};
(function($) {
    App.CmsBginfo = {
        init: function() {
            App.Common.tabs();
        },
        index: function(){
            
            //Set datatable
            $('.dataTable').dataTable();
            App.Common.thead();
        },
        editStatic: function() {
            App.Common.mce();
        }
    };
})(this.jQuery);