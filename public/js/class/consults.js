var Account = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    $(document).ready(function(){
        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtName     : 'required',
                txtEmail    : {
                    required : true,
                    email    : true
                },
                txtConsult  : 'required'
            }
        });
        $('#form1').validate(o);
    });
    /* PUBLIC METHODS
     **************************************************************************/


    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PRIVATE METHODS
     **************************************************************************/

})();
