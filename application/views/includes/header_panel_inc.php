<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="header-top">
    <a href="<?=site_url('/consultas/')?>">CONSULTAS</a>&nbsp;|&nbsp;
    <a href="<?=site_url('/mapas-del-sitio/')?>">MAPA DEL SITIO</a>&nbsp;|&nbsp;
    <a href="<?=site_url('/trabaje-con-nosotros/')?>">TRABAJE CON NOSOTROS</a>&nbsp;|&nbsp;
    <a href="<?=site_url('/contacto/')?>">CONTACTO</a>
</div>
<div class="banner">
    <img src="images/banner-01.jpg" alt="" width="950" height="160" />
    <a href="<?=$this->config->item('base_uri')?>" class="logo"><img src="images/logo.png" alt="" width="348" height="123" /></a>
</div>
<div class="menu">
    <ul id="sf-menu" class="sf-menu">
        <li><a href="<?=$this->config->item('base_url')?>" target="_blank">Home</a></li>
        <li><a href="<?=site_url('panel/myaccount')?>" <?php if( $this->uri->segment(2)=="" || $this->uri->segment(2)=="myaccount" ) echo 'class="current"'?>>Mi Cuenta</a></li>
        <li><a href="<?=site_url('panel/products')?>" <?php if( $this->uri->segment(2)=="products") echo 'class="current"'?>>Productos</a></li>
        <li><a href="<?=site_url('panel/contents')?>" <?php if( $this->uri->segment(2)=="contents") echo 'class="current"'?>>Contenidos</a></li>
        <li><a href="<?=site_url('panel/index/logout')?>">Salir</a></li>
    </ul>
</div>