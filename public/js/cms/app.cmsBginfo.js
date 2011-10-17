var App = App || {};
(function($) {
    App.CmsBginfo = {
        init: function() {
            App.Common.tabs();
        },
        index: function(){
            
            //Set datatable
            $('#dataTable').dataTable();
        },
        editStatic: function() {
            App.Common.mce();
        }
    };
})(this.jQuery);