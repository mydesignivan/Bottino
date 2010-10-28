<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contents">
    <h1 class="title">Contacto</h1>
    <p>Para cualquier pregunta urgente o espec&iacute;fica de productos, por favor contacte con la oficina de <b>Bottino Hermanos Subfactory Grundfos</b></p>
</div>

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

<form id="form1" class="form-contact" action="<?=site_url('/contacto/send');?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="span-10">
        <div class="trow">
            <label class="label" for="txtCompany">* Compa&ntilde;&iacute;a</label>
            <div class="fleft"><input type="text" name="txtCompany" id="txtCompany" /></div>
        </div>
        <div class="trow">
            <label class="label" for="txtName">* Nombre</label>
            <div class="fleft"><input type="text" name="txtName" id="txtName" /></div>
        </div>
        <div class="trow">
            <label class="label" for="txtAddress">* Direcci&oacute;n</label>
            <div class="fleft"><input type="text" name="txtAddress" id="txtAddress" /></div>
        </div>
        <div class="trow">
            <label class="label" for="txtCity">* Ciudad</label>
            <div class="fleft"><input type="text" name="txtCity" id="txtCity" /></div>
        </div>
        <div class="trow">
            <label class="label" for="txtPC">* C&oacute;digo Postal</label>
            <div class="fleft"><input type="text"  name="txtPC" id="txtPC" /></div>
        </div>
        <div class="trow">
            <label class="label" for="cboCountry">* Pa&iacute;s</label>
            <div class="fleft"><?php echo form_dropdown('cboCountry', $listCountry, '', 'id="cboCountry" onchange="Account.show_states(this)"');?></div>
        </div>
        <div class="trow hide">
            <label class="label" for="cboState">* Provincia</label>
            <div class="fleft"><select name="cboState" id="cboState"><option value="">Seleccione una provincia</option></select></div>
        </div>
    </div>
    <div class="span-10 last">
        <div class="trow">
            <label class="label" for="txtEmail">* E-Mail</label>
            <div class="fleft"><input type="text" name="txtEmail" id="txtEmail" /></div>
        </div>
        <div class="trow">
            <label class="label" for="txtPhoneCode">* Telefono</label>
            <div class="fleft">
                <input type="text" name="txtPhoneCode" id="txtPhoneCode" class="input-code" />
                <input type="text" name="txtPhoneNum" id="txtPhoneNum" class="input-num" />
            </div>
        </div>
        <div class="trow">
            <label class="label" for="txtFaxCode">Fax</label>
            <div class="fleft">
                <input type="text" name="txtFaxCode" id="txtFaxCode" class="input-code" />
                <input type="text" name="txtFaxNum" id="txtFaxNum" class="input-num" />
            </div>
        </div>
        <div class="trow">
            <label class="label" for="txtTheme">Tema</label>
            <div class="fleft"><input type="text" name="txtTheme" id="txtTheme" /></div>
        </div>
        <div class="trow">
            <label class="label" for="txtMessage">* Mensaje</label>
            <div class="fleft"><textarea id="txtMessage" name="txtMessage" rows="5" cols="22"></textarea></div>
        </div>
    </div>
    <div class="trow align-center">
        <button type="submit">Enviar</button>
    </div>
</form>