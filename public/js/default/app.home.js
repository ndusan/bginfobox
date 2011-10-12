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
                
                App.Home.loadCalendar($(this).attr('cal-time'), $(this).attr('cal-year'), $(this).attr('cal-month'));
            });

            //Lightbox
            $('a.lightbox').lightBox();  
        },
        contact: function() {},
        
        
        loadCalendar: function(time, year, month){

            var url = '';
            if(time) url+= '&currTime=' + time;
            if(year) url+= '&year=' + year;
            if(month) url+= '&month=' + month;
            
            $.ajax({
               type: 'GET',
               url:  '/load-calendar',
               data: 'lang=' + lang + url,
               success: function(msg){
                 $('#calendar').removeClass('loader').html(msg);
               } 
            });
        }

    };
})(this.jQuery)