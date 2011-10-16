var App = App || {};
(function($) {
    App.CmsBginfo = {
        init: function() {
            App.Common.tabs();
        },
        editStatic: function() {
            App.Common.mce();
        }
    };
})(this.jQuery);