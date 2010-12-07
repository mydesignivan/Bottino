<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contents contents-width">
    <h1 class="title"><?=$info['categorie_name']?></h1>
    <p><?=$info['categorie_content']?></p>
    <br />

<?php
    foreach( $info['listProducts'] as $row ){
?>
    <div class="trow">
<?php
$product_content = $row['product_content'];
$product_title = $row['product_name'];
$strsearch = urldecode($this->uri->segment(3));
if( $this->uri->segment(2)=="leermas" ) {
    $product_content = str_replace($strsearch, '<span class="resalt">'.$strsearch.'</span>', $product_content);
    $product_title = str_replace($strsearch, '<span class="resalt">'.$strsearch.'</span>', $product_title);
}
?>
        <span class="title-product"><?=$product_title?></span>&nbsp;<?=$product_content?>
    </div>
    <?php }?>

</div>