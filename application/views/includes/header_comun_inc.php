<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="header-top<?php if($ER) echo ' header-top-er'?>">
    <a href="http://www.bottinosa.com" class="link-1" target="_blank" title="Bottino Hnos. Subfactory GRUNDFOS"><img src="public/images/subfactory-grundfos-iso-24.png" alt="" width="24" height="24" /><span>&nbsp;Subfactory</span></a>
    <form id="form-search" class="fsearch" action="<?=site_url('/productos/search');?>" method="post" enctype="application/x-www-form-urlencoded">
        <input type="text" name="txtSearch" value="<?=$this->input->post('txtSearch')!='' ? $this->input->post('txtSearch') : 'BUSCAR'?>" onblur="set_input(event, 'BUSCAR')" onfocus="clear_input(event)" />
        <a href="javascript:void($('form-search').submit())"><img src="public/images/icon-lupa.png" alt="Buscar" width="18" height="18" /></a>
    </form>
    <div class="span-13 fright">
        <a href="<?=site_url('/consultas/')?>" <?php if( $this->uri->segment(1)=='consultas' ) echo 'class="current"'?>>CONSULTAS</a>&nbsp;|&nbsp;
        <a href="<?=site_url('/mapa-del-sitio/')?>" <?php if( $this->uri->segment(1)=='mapa-del-sitio' ) echo 'class="current"'?>>MAPA DEL SITIO</a>&nbsp;|&nbsp;
        <a href="<?=site_url('/trabaje-con-nosotros/')?>" <?php if( $this->uri->segment(1)=='trabaje-con-nosotros' ) echo 'class="current"'?>>TRABAJE CON NOSOTROS</a>&nbsp;|&nbsp;
        <a href="<?=site_url('/contacto/')?>" <?php if( $this->uri->segment(1)=='contacto' ) echo 'class="current"'?>>CONTACTO</a>
    </div>
</div>
<div class="banner">
    <div id="banner">
<?php if( $ER ){?>
        <img src="public/images/banners/energia_renovable/banner-energia-01.jpg" alt="" title="" width="950" height="165" />
        <img src="public/images/banners/energia_renovable/banner-energia-02.jpg" alt="" title="" width="950" height="165" />
        <img src="public/images/banners/energia_renovable/banner-energia-03.jpg" alt="" title="" width="950" height="165" />
        <img src="public/images/banners/energia_renovable/banner-energia-04.jpg" alt="" title="" width="950" height="165" />
<?php }else{?>
        <img src="public/images/banners/general/banner-general-01.jpg" alt="" title="" width="950" height="165" />
        <img src="public/images/banners/general/banner-general-02.jpg" alt="" title="" width="950" height="165" />
        <img src="public/images/banners/general/banner-general-03.jpg" alt="" title="" width="950" height="165" />
        <img src="public/images/banners/general/banner-general-04.jpg" alt="" title="" width="950" height="165" />
<?php }?>
    </div>
    <?php if( $ER ){?>
    <a href="<?=$this->config->item('base_url')?>" class="logo"><img src="public/images/logo-blue.png" alt="" width="348" height="123" /></a>
    <?php }else{?>
    <a href="<?=$this->config->item('base_url')?>" class="logo"><img src="public/images/logo.png" alt="" width="348" height="123" /></a>
    <?php }?>
</div>
