var App = App || {};
(function($) {
    App.Common = {
        init: function() {
            
            /** GENERAL **/
            $('.jw').click(function(){
                var answer = confirm ("Are you sure you want to delete this line?");
                if (!answer) return false;
            });
            $('.jl').click(function(){
                var answer = confirm ("Are you sure you want to logout?");
                if (!answer) return false;
            });
            
            
            //Set check on required fields
            $('body').delegate('form', 'submit', function(){
                var allOk = true;
                
                $('.jr').each(function(){
                    if($(this).val().length <= 0){
                        
                        $(this).addClass('warning');
                        $(this).closest('tr').addClass('warningTr');

                        allOk = false;
                    }else{
                        $(this).removeClass('warning');
                    }
                });
                
                if(!allOk) return false;
            });
        },
        mce: function() {
            tinyMCE.init({
                    theme : "advanced",
                    mode : "textareas",
                    plugins : "fullpage",
                    theme_advanced_buttons3_add : "fullpage"
            });
        },
        datepicker: function() {
            
            $('.datepicker').datepicker({
                firstDay: 1,
                dateFormat: 'dd-mm-yy'
            });
        },
        tabs: function() {
            
            $('.tabs').tabs();
        },
        thead: function(){
            
            $('.display').thead();
        }
    };
})(this.jQuery);