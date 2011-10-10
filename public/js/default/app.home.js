var App = App || {};
(function($) {
    App.Home = {
        init: function() {
            $("#slides").slides({
                pagination: true,
                effect: 'fade',
                play: 5000
            });
            
            //on load
            App.Home.loadCalendar();
            
            //Load calendar or request
            $('body').delegate('.loadCalendar', 'click', function(e){
                e.preventDefault();
                $('#calendar').addClass('loader')
                
                App.Home.loadCalendar($(this).attr('title'));
            });
            
        },
        contact: function() {},
        
        loadCalendar: function(month){

            $.ajax({
               type: 'GET',
               url:  '/calendar',
               data: month ? 'lang='+lang+'&month='+month : 'lang='+lang,
               success: function(msg){
                 $('#calendar').removeClass('loader').html(msg);
               } 
            });
        }

    };
})(this.jQuery)