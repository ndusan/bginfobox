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
                        allOk = false;
                    }else{
                        $(this).removeClass('warning');
                    }
                });
                
                if(!allOk) return false;
            });
            
        }
    };
})(this.jQuery);