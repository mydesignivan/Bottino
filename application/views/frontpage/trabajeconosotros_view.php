<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contents">
    <h1 class="title">Trabaje con nosotros</h1>
    <p>Para trabajar o representar a Electromec&aacute;nica Bottino Hnos S.A. env&iacute;e su curr&iacute;culum e indique en que zona podr&iacute;a trabajar.</p>
    <br />

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

    <form id="form1" class="form-tcn" action="<?=site_url('/trabajeconosotros/send');?>" method="post" enctype="multipart/form-data">
        <div class="span-11">
            <div class="trow">
                <label class="label" for="txtName">* Nombre y Apellido</label>
                <div class="fleft"><input type="text" name="txtName" id="txtName" /></div>
            </div>
            <div class="trow">
                <label class="label" for="txtPhoneCode">* Tel&eacute;fonos</label>
                <div class="fleft"><input type="text" name="txtPhoneCode" id="txtPhoneCode" class="input-code" /><input type="text" name="txtPhoneNum" id="txtPhoneNum" class="input-num" /></div>
            </div>
            <div class="trow">
                <label class="label" for="txtEmail">* E-Mail</label>
                <div class="fleft"><input type="text" name="txtEmail" id="txtEmail" /></div>
            </div>
            <div class="trow">
                <label class="label" for="txtAddess">* Direcci&oacute;n</label>
                <div class="fleft"><input type="text" name="txtAddess" id="txtAddess" /></div>
            </div>
            <div class="trow">
                <label class="label" for="txtNac">* Fecha de Nacimiento</label>
                <div class="fleft"><input type="text" name="txtNac" id="txtNac" class="fnac" readonly="readonly" /></div>
            </div>
            <div class="trow">
                <label class="label" for="optSexM">* Sexo</label>
                <div class="fleft"><label><input type="radio" name="optSex" id="optSexM" value="Masculino" /> Masculino</label>&nbsp;&nbsp;<label><input type="radio" name="optSex" value="Femenino" /> Femenino</label></div>
            </div>
            <div class="trow">
                <label class="label" for="txtCV">Curriculum</label>
                <div class="fleft"><input type="file" name="txtCV" id="txtCV" /><br /><span class="legend">Extensi&oacute;n (.doc/.docx/.pdf). 2MB m&aacute;x.</span></div>
            </div>
        </div>

        <div class="span-11 fright">
            <div class="trow">
                <label class="label">&nbsp;</label>
                <label><input type="radio" name="optTipo" value="Trabajar" checked="checked" /> Trabajar</label>&nbsp;&nbsp;<label><input type="radio" name="optTipo" value="Representar" /> Representar</label>
            </div>
            <div class="trow">
                <label class="label" for="txtZona">* Zona de inter&eacute;s</label>
                <div class="fleft"><input type="text" name="txtZona" id="txtZona" /></div>
            </div>
            <div class="trow">
                <label class="label" for="txtExperiencia">Experiencia<br />(Cargos o puestos ocupados, Per&iacute;odos)</label>
                <div class="fleft"><textarea rows="5" cols="10" id="txtExperiencia" name="txtExperiencia"></textarea></div>
            </div>
            <div class="trow">
                <label class="label" for="txtPrograms">Programas<br />que manej&aacute;s<br />con rapidez</label>
                <div class="fleft"><textarea rows="5" cols="10" id="txtPrograms" name="txtPrograms"></textarea></div>
            </div>
        </div>


        <div class="clear trow align-center">
            <button type="submit">Enviar</button>
        </div>
    </form>
</div>