var count=0;
jQuery(function(){
    jQuery('#sf-menu').superfish({
        animation : {opacity:'show',height:'show'},
        onBeforeShow : function(){
            /*$('#main-container').css({
                position : 'relative',
                'z-index' : -1
            });*/
        },
        onHide : function(){
            /*count++;
            document.title = count;
            $('#main-container').css({
                position : 'inherit',
                'z-index' : 0
            });*/
        }
    });

    /*$('#main-container').hover(function(){
        $('#main-container').css({
            position : 'inherit',
            'z-index' : 0
        });
    });*/
});
