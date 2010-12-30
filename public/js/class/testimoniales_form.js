var Testimoniales = new (function(){

    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* CONSTRUCTOR
     **************************************************************************/
    $(document).ready(function(){
        var rules = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtAutor : 'required',
                txtTestimonio : 'tinymce_required'
            }
        });
        $('#form1').validate(rules);

        TinyMCE_init.width = '98%';
        TinyMCE_init.height = '200px';
        TinyMCE_init.mode = 'exact';
        TinyMCE_init.elements = 'txtTestimonio';
        tinyMCE.init(TinyMCE_init);
    });

    /* PUBLIC METHODS
     **************************************************************************/

    /* PRIVATE METHODS
     **************************************************************************/

})();
