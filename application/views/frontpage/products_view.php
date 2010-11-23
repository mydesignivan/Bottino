<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contents contents-width">
    <h1 class="title"><?=$info['categorie_name']?></h1>
    <p><?=$info['categorie_content']?></p>
    <br />

<?php
    foreach( $info['listProducts'] as $row ){
?>
    <div class="trow">
        <span class="title-product"><?=$row['product_name']?></span>&nbsp;<?=$row['product_content']?>
    </div>
    <?php }?>

</div>