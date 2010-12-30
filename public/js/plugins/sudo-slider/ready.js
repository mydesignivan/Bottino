$(document).ready(function(){
    var a = $("#sudo-slider");
    var b=[];
    a.find('li').each(function(){
        b.push('<div class="sudo-slider-page"></div>');
    });
    a.sudoSlider({
        continuous : true,
        //history : true,
        prevNext : false,
        /*prevHtml : '<a href="#" class="link-prev"><img src="public/images/testimoniales-bg-arrow-left.jpg" alt="Anterior" width="32" height="64"  /></a>',
        nextHtml : '<a href="#" class="link-next"><img src="public/images/testimoniales-bg-arrow-right.jpg" alt="Siguiente" width="32" height="64" /></a>',*/
        numeric : true,
        numericText : b
    });

    $('a.link-prev, a.link-next').hover(function(){
        $(this).css('opacity', '0.5');
    }, function(){
        $(this).css('opacity', '1');
    });
    $('a.link-prev').click(function(e){
        e.preventDefault();
        a.sudoSlider('prev');
        return false;
    });
    $('a.link-next').click(function(e){
        e.preventDefault();
        a.sudoSlider('next');
        return false;
    });

});