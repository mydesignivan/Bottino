<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id="error" class="error hide"></div>

<form id="form1" class="form-products" action="<?=site_url('/panel/products/ajax_products_'. (isset($info) ? 'edit' : 'create'));?>" method="post" enctype="application/x-www-form-urlencoded">
    <div class="trow">
        <label class="label">Categor&iacute;a Padre:</label>
        <span id="txtParentCat"></span>
    </div>
    <div class="trow">
        <label class="label" for="txtName">* Nombre Producto</label>
        <div class="fleft"><input type="text" name="txtName" id="txtName" value="<?=@$info['product_name']?>" /></div>
    </div>
    <div class="trow">
        * Descripci&oacute;n<br />
        <textarea rows="10" cols="22" id="txtContent" name="txtContent"><?=@$info['product_content']?></textarea>
    </div>

    <input type="hidden" name="products_id" id="products_id" value="<?=@$info['products_id']?>" />
    <input type="hidden" name="categorie_reference" value="<?=$reference?>" />
</form>