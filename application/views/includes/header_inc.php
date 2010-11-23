<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="header-top">
    <a href="<?=site_url('/consultas/')?>" <?php if( $this->uri->segment(1)=='consultas' ) echo 'class="current"'?>>CONSULTAS</a>&nbsp;|&nbsp;
    <a href="<?=site_url('/mapa-del-sitio/')?>" <?php if( $this->uri->segment(1)=='mapa-del-sitio' ) echo 'class="current"'?>>MAPA DEL SITIO</a>&nbsp;|&nbsp;
    <a href="<?=site_url('/trabaje-con-nosotros/')?>" <?php if( $this->uri->segment(1)=='trabaje-con-nosotros' ) echo 'class="current"'?>>TRABAJE CON NOSOTROS</a>&nbsp;|&nbsp;
    <a href="<?=site_url('/contacto/')?>" <?php if( $this->uri->segment(1)=='contacto' ) echo 'class="current"'?>>CONTACTO</a>
</div>
<div class="banner">
    <img src="images/banner-01.jpg" alt="" width="950" height="160" />
    <a href="<?=$this->config->item('base_uri')?>" class="logo"><img src="images/logo.png" alt="" width="348" height="123" /></a>
</div>
<div class="menu">
    <?=$listMenu?>
</div>

