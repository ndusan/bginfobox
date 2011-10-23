var App = App || {};
(function($) {
    App.CmsUser = {
        init: function() {
            //Set check on required fields
            $('body').delegate('form', 'submit', function(){
                var allOk = true;
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                
                $('.jr').each(function(){
                    if($(this).val().length <= 0){
                        $(this).addClass('warning');
                        allOk = false;
                    }else{
                        if($(this).hasClass('email') && reg.test($(this).val()) == false){
                            $(this).addClass('warning');
                            allOk = false;
                        }else{
                            $(this).removeClass('warning');
                        }
                    }
                });
                
                if(!allOk) return false;
            });
        },
        index: function() {
            
            //Set datatable
            $('#dataTable').dataTable();
            App.Common.thead();
        }
    };
})(this.jQuery);