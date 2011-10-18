var App = App || {};
(function($) {
    App.CmsPockets = {
        init: function() {
            App.Common.tabs();
        },
        index: function() {
            //Set datatable
            $('.dataTable').dataTable();  
        },
        editStatic: function() {
            App.Common.mce();
        },
        addInfo: function() {
            App.Common.mce();
        },
        editInfo: function() {
            App.Common.mce();
        }
    };
})(this.jQuery);