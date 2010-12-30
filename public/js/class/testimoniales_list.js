var Testimoniales = new (function(){

    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* CONSTRUCTOR
     **************************************************************************/
    $(document).ready(function(){
        $('#btnNew').click(function(){location.href=get_url('panel/testimoniales/form')});
        $('#btnDel').click(function(){Testimoniales.del(false)});

        $('#sortable').sortable({
            stop : function(){
                $('#sortable').sortable( "option", "disabled", true );

                var initorder = $(this).find('tr:first').attr('id').substr(2);

                var arr = $(this).sortable("toArray");

                $.post('panel/testimoniales/ajax_order', {rows : JSON.encode(arr), initorder : initorder}, function(data){
                    if( data!="success" ) alert('ERROR AJAX:\n\n'+data);
                    else {
                        $('#sortable').sortable( "option", "disabled", false )
                    }
                });
            },
            handle : '.handle'
        }).disableSelection();

    });

    /* PUBLIC METHODS
     **************************************************************************/
     this.del = function(id){
        var txt="";
        if( !id ){
            id = [];
            var a=[];
            $('#tblList tbody input:checked').each(function(){
                id.push($(this).val());
                a.push($(this).parent().parent().find('td.cell3').text());
            });
            if( id.length==0 ) {
                alert("No se ha seleccionado ningun item.");
                return false;
            }
            id = id.join('/');
            txt = a.join(', ')
        }else txt = $('#tr'+id).find('td.cell3').text();

        if( confirm('¿Confirma la eliminación?\n'+txt) ) location.href = get_url('panel/testimoniales/delete/'+id);

        return false;
     }


    /* PRIVATE METHODS
     **************************************************************************/

})();
