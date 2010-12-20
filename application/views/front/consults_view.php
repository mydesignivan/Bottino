<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contents">
    <div class="span-10">
        <h1 class="title fleft">Consultas</h1>
        <a href="http://www.bottinosa.com" target="_blank" class="link-bottsubf">Bottino Subfactory</a>
    </div>
    <div class="clear"></div>

    <?php if( $this->session->flashdata('status_sendmail')=="ok" ){?>
    <br />
    <div class="success">
        Muchas gracias por comunicarse, en breve estaremos en contacto.
    </div>
    <?php }elseif( $this->session->flashdata('status_sendmail')=="error" ){?>
    <br />
    <div class="error">
        El formuarlio no ha podido ser enviado, porfavor, intentelo nuevamente.
    </div>
    <?php }?>

    <form id="form1" class="form-contact span-10" action="<?=site_url('/consultas/send');?>" method="post" enctype="application/x-www-form-urlencoded">
        <div class="trow">
            <label class="label" for="txtName">* Nombre</label>
            <div class="fleft"><input type="text" name="txtName" id="txtName" /></div>
        </div>
        <div class="trow">
            <label class="label" for="txtSubject">Asunto</label>
            <div class="fleft"><input type="text" name="txtSubject" id="txtSubject" /></div>
        </div>
        <div class="trow">
            <label class="label" for="txtEmail">* E-Mail</label>
            <div class="fleft"><input type="text" name="txtEmail" id="txtEmail" /></div>
        </div>
        <div class="trow">
            <label class="label" for="txtConsult">* Consulta</label>
            <div class="fleft"><textarea id="txtConsult" name="txtConsult" rows="5" cols="22"></textarea></div>
        </div>
        <div class="trow" style="text-align: right">
            <button type="submit">Enviar</button>
        </div>
    </form>
</div>