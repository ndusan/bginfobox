var App = App || {};
(function($) {
    App.CmsClients = {
        init: function() {
        },
        
        index: function() {
            
            //Set datatable
            $('.dataTable').dataTable();
            App.Common.thead();
            App.Common.tabs();
        }, 
        add: function() {
            App.CmsClients.checkbox();
            App.CmsClients.paidClients();
            App.Common.datepicker();
        },
        edit: function() {
            App.CmsClients.checkbox();
            App.CmsClients.paidClients();
            App.Common.datepicker();
        },
        addNode: function() {
            App.Common.tabs();
            App.Common.mce();
        }, 
        editNode: function() {
            App.Common.tabs();
            App.Common.mce();
        },
        checkbox: function() {
            
            //On load
            var noSelectedClient = true, noSelectedDistributor = true; 
            $('.jstatic').each(function(){
               if($(this).is(':checked')) noSelectedClient = false;
            });
            $('.jdynamic').each(function(){
               if($(this).is(':checked')) noSelectedDistributor = false;
            });
            
            if(false == noSelectedClient) $('#jstatic').attr('checked', true);
            else $('#jstatic').attr('checked', false);
            
            if(false == noSelectedDistributor) $('#jdynamic').attr('checked', true);
            else $('#jdynamic').attr('checked', false);
            
            
            //On click
            $('.jstatic').click(function(){
               var noSelected = true; 
               
               $('.jstatic').each(function(){
                   if($(this).is(':checked')){
                       noSelected = false;
                   }
               });
               
               if(false == noSelected){
                   $('#jstatic').attr('checked', true);
               }else{
                   $('#jstatic').attr('checked', false);
               }
            });
            
            $('.jdynamic').click(function(){
               var noSelected = true; 
               
               $('.jdynamic').each(function(){
                   if($(this).is(':checked')){
                       noSelected = false;
                   }
               });
               
               if(false == noSelected){
                   $('#jdynamic').attr('checked', true);
               }else{
                   $('#jdynamic').attr('checked', false);
               }
            });
            
            
            $('#jstatic').click(function() {
               var status = false; 
                
               if($(this).is(':checked')) status = true;

               $('.jstatic').each(function(){
                  $(this).attr('checked', status); 
               });
            });
            
            $('#jdynamic').click(function() {
               var status = false; 
                
               if($(this).is(':checked')) status = true;
               
               $('.jdynamic').each(function(){
                  $(this).attr('checked', status); 
               });
            });
        },
        paidClients: function() {
            
            $('#client_paid').click(function(){
               if($(this).attr('checked')=='checked'){
                   $('.datepicker').attr('disabled', false);
               }else{
                   $('.datepicker').attr('disabled', true);
               }
            });
        }
    };
})(this.jQuery);