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
                plugins : "fullscreen",
                theme_advanced_buttons3_add : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
                // Theme options
                theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
                theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,forecolor,backcolor,hr,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,fullscreen",
                theme_advanced_buttons3 : "",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : true
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
        },
        jtooltip: function(){
            $( ".jtooltip" ).tooltip();
        }
    };
})(this.jQuery);