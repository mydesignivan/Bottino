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
            }
        });
        $('#form1').validate(o);

        formatNumber.init('#txtPhoneNum, #txtPhoneCode');

        var y = $('#currentYear').val();
        $("#txtNac").datepicker({
            showOn          : 'both',
            buttonImage     : 'public/images/1288282754_schedule.png',
            buttonImageOnly : true,
            dateFormat      : 'dd-mm-yy',
            changeMonth     : true,
            changeYear      : true,
            yearRange       :  (y-80)+':'+y,
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
