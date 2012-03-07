var App = App || {};
(function($) {
    App.CmsProjects = {
        init: function() {
            App.Common.tabs();
            App.Common.mce();
        },
        index: function(){
            
            //Set datatable
            $('.dataTable').dataTable({"aaSorting": [[ 1, "desc" ]], "iDisplayLength": 50});
            App.Common.thead();
        }
    };
})(this.jQuery);