var App = App || {};
(function($) {
    App.Home = {
        init: function() {
            $("#slides").slides({
                pagination: true,
                effect: 'fade',
                play: 5000
            });
            
            //Load calendar
            $('body').delegate('.loadCalendar', 'click', function(e){
                e.preventDefault();
                
                App.Home.loadCalendar($(this).attr('title'));
            });
            
        },
        contact: function() {},
        
        loadCalendar: function(month){
            
            $.ajax({
               type: 'GET',
               url:  '/calendar',
               data: 'month='+month,
               success: function(msg){
                 $('#calendar').html(msg);
               } 
            });
        }

    };
})(this.jQuery)