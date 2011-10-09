var App = App || {};
(function($) {
    App.CmsEvents = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
        },
        add: function() {
            
            App.CmsEvents.datepicker();
        },
        edit: function() {
            
            App.CmsEvents.datepicker();
        },
        datepicker: function() {
            
            $('.datepicker').datepicker({
                firstDay: 1,
                dateFormat: 'yy-mm-dd'
            });
        }
    };
})(this.jQuery);