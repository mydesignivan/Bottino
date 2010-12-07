var Chart = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    $(document).ready(function(){
        var div = $('#chart');

        $('<img />').load(function(){
                        var img = $(this);
                        div.css('background', 'none').append(img);
                        $('#map1 area').tooltip({ 
                            positionLeft : true,
                            showURL : false,
                            left : 50
                        });

                    }).attr({
                        'src' : './images/chart.jpg',
                        'alt' : '',
                        'width'  : '948',
                        'height' : '327',
                        'usemap' : '#map1'
                    });

    });

    /* PUBLIC METHODS
     **************************************************************************/


    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PRIVATE METHODS
     **************************************************************************/

})();