var App = App || {};
(function($) {
    App.CmsPockets = {
        init: function() {
            App.Common.tabs();
        },
        index: function() {
            //Set datatable
            $('.dataTable').dataTable();
            $('.dataTableSortable').dataTable({
                "bSort": false
            });
            
            $(".dataTableSortable tbody").sortable({
                cursor: "move",
                start:function(event, ui){
                    startPosition = ui.item.prevAll().length+1;
                    sId = $('.jpos-'+startPosition).attr('id');
                    sId = sId.substr(2, sId.length);
                },
                update: function(event, ui) {
                    endPosition = ui.item.prevAll().length + 1;
                    eId = $('.jpos-'+endPosition).attr('id');
                    eId = eId.substr(2, eId.length);
                    
                    $.ajax({
                          url: '/cms/pockets/position',
                          type: 'GET',
                          data: {start : $('.jpos-'+startPosition).val(), 
                                 end : $('.jpos-'+endPosition).val(),
                                 start_id : sId,
                                 end_id : eId
                          },
                          success: function(data){
                            if(data){
                                var d = new Date();
                                window.location.href = '/cms/pockets?cache='+d.getTime()+'#fragment-'+ $('#cityTab').val(); 
                            }
                          }
                          
                    });
                 }
            });
            
            App.Common.thead();
        },
        editStatic: function() {
            App.Common.mce();
        },
        addInfo: function() {
            App.Common.mce();
        },
        editInfo: function() {
            App.Common.mce();
        }
    };
})(this.jQuery);