<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
$ER=false;
require(APPPATH . 'views/includes/header_comun_inc.php');
?>
<div class="menu">
    <ul id="sf-menu" class="sf-menu">
        <li><a href="<?=$this->config->item('base_url')?>" target="_blank">Home</a></li>
        <li><a href="<?=site_url('panel/myaccount')?>" <?php if( $this->uri->segment(2)=="" || $this->uri->segment(2)=="myaccount" ) echo 'class="current"'?>>Mi Cuenta</a></li>
        <!--<li><a href="<?//=site_url('panel/products')?>" <?php //if( $this->uri->segment(2)=="products") echo 'class="current"'?>>Productos</a></li>-->
        <li><a href="<?=site_url('panel/contents')?>" <?php if( $this->uri->segment(2)=="contents") echo 'class="current"'?>>Contenidos</a></li>
        <li><a href="<?=site_url('panel/testimoniales')?>" <?php if( $this->uri->segment(2)=="testimoniales") echo 'class="current"'?>>Testimoniales</a></li>
        <li><a href="<?=site_url('panel/index/logout')?>">Salir</a></li>
    </ul>
</div>