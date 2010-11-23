<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="contents contents-width">
    <h1 class="title">Mapa del sitio</h1>
    <?php
        $listMenu = str_replace('id="sf-menu" class="sf-menu"', 'class="list-sitemap"', $listMenu);
        $listMenu = str_replace('href="#"', 'href="'.site_url('mapa-del-sitio/#').'"', $listMenu);
        echo $listMenu;
    ?>
</div>