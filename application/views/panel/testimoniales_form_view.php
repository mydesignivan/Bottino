<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?=$this->template->message()?>

<form id="form1" class="form-testimoniales" action="<?=site_url('/panel/testimoniales/'. (isset($info) ? 'edit' : 'create'));?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow">
        <label class="label" for="txtAutor">* Autor</label>
        <div class="fleft"><input type="text" name="txtAutor" id="txtAutor" value="<?=@$info['autor']?>" /></div>
    </div>
    <div class="trow">
        <label class="label" for="txtEmpresa">Empresa</label>
        <div class="fleft"><input type="text" name="txtEmpresa" id="txtEmpresa" value="<?=@$info['empresa']?>" /></div>
    </div>
    <div class="trow">
        <label class="label" for="txtCargo">Cargo</label>
        <div class="fleft"><input type="text" name="txtCargo" id="txtCargo" value="<?=@$info['cargo']?>" /></div>
    </div>
    <div class="trow">
        <label class="label" for="txtTestimonio">* Testimonial</label><br />
        <textarea rows="10" cols="20" id="txtTestimonio" name="txtTestimonio"><?=@$info['testimonio']?></textarea>
    </div>
    <div class="trow align-center"><button type="submit">Guardar</button></div>
    <input type="hidden" name="id" value="<?=@$info['id']?>" />
</form>