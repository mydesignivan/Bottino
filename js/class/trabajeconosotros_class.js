var TCN = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    $(document).ready(function(){
        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtName     : 'required',
                txtEmail    : 'required',
                txtAddess   : 'required',
                txtNac      : 'required',
                optSex      : 'required',
                txtZona     : 'required',
                txtPhoneNum : 'required'
            },
            submitHandler : function(form){
                form.submit();
            }
        });
        $('#form1').validate(o);

        formatNumber.init('#txtPhoneNum, #txtPhoneCode');

        $("#txtNac").datepicker({
            showOn          : 'both',
            buttonImage     : 'images/1288282754_schedule.png',
            buttonImageOnly : true,
            dateFormat      : 'dd-mm-yy',
            changeMonth     : true,
            changeYear      : true,
            monthNamesShort : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        });

    });

    /* PUBLIC METHODS
     **************************************************************************/

    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PRIVATE METHODS
     **************************************************************************/

})();
