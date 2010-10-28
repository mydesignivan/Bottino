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
    <?//=$listMenu?>
    <ul class="sf-menu">
        <li><a href="<?=$this->config->item('base_url')?>" class="current">HOME</a></li>
        <li><a href="">EMPRESA</a></li>
        <li><a href="">PRODUCTOS</a></li>
        <li><a href="">ENERGÍA RENOVABLE</a></li>
        <li><a href="">SERVICIOS</a></li>
        <li><a href="">REPRESENTACIONES</a></li>
        <li><a href="">OBRAS</a></li>
        <li><a href="">TESTIMONIALES</a></li>
    </ul>
</div>

