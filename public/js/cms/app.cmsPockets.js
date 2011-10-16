var App = App || {};
(function($) {
    App.CmsPockets = {
        init: function() {
            App.Common.tabs();
        },
        editStatic: function() {
            App.Common.mce();
        }
    };
})(this.jQuery);