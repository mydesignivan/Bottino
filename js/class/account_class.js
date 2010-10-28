var Account = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    $(document).ready(function(){
        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtCompany  : 'required',
                txtName     : 'required',
                txtAddress  : 'required',
                txtCity     : 'required',
                txtPC       : 'required',
                cboCountry  : 'required',
                cboState    : 'required',
                txtEmail    : {
                    required : true,
                    email    : true
                },
                txtPhoneNum : 'required',
                txtMessage  : 'required'
            },
            submitHandler : function(form){
                form.submit();
            },
            invalidHandler : function(){
            }
        });
        $('#form1').validate(o);

        formatNumber.init('#txtPhoneNum, #txtPhoneCode, #txtFaxCode, #txtFaxNum, #txtPC');
    });
    /* PUBLIC METHODS
     **************************************************************************/
     this.show_states = function(me){
         me.disabled=true;
         $.post(get_url('contacto/ajax_show_states'), 'country_id='+me.value, function(data){
             me.disabled=false;
             $('#cboState').parent().parent().show()
             $('#cboState').html(data);
         });
     };


    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PRIVATE METHODS
     **************************************************************************/

})();
