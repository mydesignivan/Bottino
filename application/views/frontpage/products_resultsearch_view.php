<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contents">
<?php
if( count($info['listProducts'])>0 ){
$titlecatold='';
?>

    <h1 class="title">Resultado de b&uacute;queda</h1>

<?php foreach( $info['listProducts'] as $row ){
?>
    <div class="trow">
<?php
    if( $titlecatold != $row['categorie_name'] ) {
        echo '<h4 class="title">'.$row['categorie_name'].'</h4>';
    }
?>
        <a href="<?=site_url('productos/leermas/'.urlencode($this->input->post('txtSearch')).'/'.$row['categories_id'])?>" class="link-inherit"><span class="title-product"><?=$row['product_name']?></span>&nbsp;<?=character_limiter($row['product_content'],20)?></a>
    </div>

<?php 
$titlecatold = $row['categorie_name'];
}?>

<?php }else{?>
    <div class="align-center"><h4>No hay resultados con "<?=$this->input->post('txtSearch')?>".</h4></div>
<?php }?>
</div>