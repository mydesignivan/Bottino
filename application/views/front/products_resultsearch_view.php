<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contents">
<?php
if( count($listResult)>0 ){
$title='';
$search = urlencode($this->input->post('txtSearch'));
?>
    <h1 class="title">Resultado de b&uacute;queda</h1>

<?php foreach( $listResult as $row ){?>
    <div class="trow">
<?php
    if( $title != $row['title'] ) echo '<h4 class="title">'.$row['title'].'</h4>';
?>
        <a href="<?=site_url('productos/leermas/'.$row['content_id'].'/'.$search)?>" class="link-inherit"><?=character_limiter(strip_tags($row['content']),100)?></a>
    </div>

<?php 
$title = $row['title'];
}?>

<?php }else{?>
    <div class="align-center"><h4>No hay resultados con "<?=$this->input->post('txtSearch')?>".</h4></div>
<?php }?>
</div>