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
                $('#loader').addClass('loader')
                
                App.Home.loadCalendar($(this).attr('cal-time'), $(this).attr('cal-year'), $(this).attr('cal-month'));
            });

            //Lightbox
            $('a.lightbox').lightBox(); 
            
            //Activate
            App.Home.bgdguide();
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
                   $('#calendar').html(msg);
                   $('#loader').removeClass('loader');
               } 
            });
        },
        bgdguide: function() {
            
            $('#bgdguide').click(function(){
               $('.guideNav').slideToggle();
               var v = $('.guideNav').attr('style').split(':')[1];
               
               if(v.split(';')[0] == ' hidden'){
                   $(this).addClass('active');
               }else{
                   $(this).removeClass('active');
               }
            });
        },
        archive: function(){
            
            App.Home.liFix();
            $(".galleryAll li").equalHeights();
            $(".archiveAll ul li").equalHeights();
        },
        dynamicPages: function(){
            
            App.Home.liFix();
            $(".infoExtra > li").equalHeights();
        },
        liFix: function(){
           $.fn.equalHeights = function() {
               var max_height = 0;
               var currentHeight = 0;

               this.each(function() {
                   currentHeight = $(this).height();
                   if(currentHeight > max_height) {
                       max_height = currentHeight;
                   }
               });
               this.each(function() {
                   $(this).height(max_height);
               });
            }; 
        }

    };
})(this.jQuery)