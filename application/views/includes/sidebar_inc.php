<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="sidebar">
<?php if( isset($content['sidebar']['menu']) ) {
    $css = $content['sidebar']['has_submenu']==0 ? " menu-sidebar2" : "";
?>
    <ul class="menu-sidebar<?=$css?>">
<?php
    $segs = $this->uri->segment_array();
    $lastSeg = count($segs)==3 ? $segs[count($segs)-1] : $segs[count($segs)];
    foreach( $content['sidebar']['menu'] as $row ){
        $class = $row['reference']==$lastSeg ? 'class="current"' : '';
        $arrow = isset($row['submenu']) ? '<span>&gt;&nbsp;</span>' : '';
?>
        <li <?=$class?>><a href="<?=site_url($segs[1].'/'.$row['reference'])?>"><?=$arrow.$row['title']?></a>
<?php
        if( isset($row['submenu']) && $row['reference']==$lastSeg ) {
            echo '<ul class="submenu">';
            foreach( $row['submenu'] as $row2 ){
                $class = $row2['reference']==$segs[count($segs)] ? 'class="current"' : '';
            ?>
                <li><a href="<?=site_url($segs[1].'/'.$row['reference'].'/'.$row2['reference'])?>" <?=$class?>><?=$row2['title']?></a></li>

            <?php }
            echo '</ul>';
        }
?>
        </li>
    <?php }?>
    </ul>
<?php }?>

<?php
    if( $content['content_id']==5 ){
        echo '<a href="images/certificado_calidad_1.jpg" rel="group" class="jq-fancybox" title="Click para ampliar"><img src="images/certificado_calidad_thumb_1.jpg" alt="Politica de calidad" width="183" height="290" class="image" /></a>';
        echo '<a href="images/certificado_calidad_2.jpg" rel="group" class="jq-fancybox"><img src="images/certificado_calidad_thumb_2.jpg" alt="Certificado" width="183" height="282" class="image" /></a>';
    }
?>

<?php if( isset($content['sidebar']['gallery']) ) {?>

    <?php if( $content['show_gallery']==1 ){?>
    <div id="gallery" class="ad-gallery">
        <div class="ad-image-wrapper"></div>
        <div class="ad-nav">
            <div class="ad-thumbs">
                <ul class="ad-thumb-list">
            <?php
            $n=-1;
            foreach( $content['sidebar']['gallery'] as $row ){$n++;?>
                    <li>
                        <a href="<?=UPLOAD_PATH_SIDEBAR.$row['image']?>"><img src="<?=UPLOAD_PATH_SIDEBAR.$row['thumb']?>" title="<?php if( strpos($row['title'], '{')===false ) echo $row['title']?>" alt="<?//=$row['thumb']?>" class="image<?=$n?>" /></a>
                    </li>
            <?php }?>
                </ul>
            </div>
        </div>
    </div>

    <?php }else{?>
    
    <?php
        foreach( $content['sidebar']['gallery'] as $row ){
            echo '<img src="'. UPLOAD_PATH_SIDEBAR.$row['thumb'] .'" alt="'. $row['thumb'] .'" width="'. $row['width'] .'" height="'. $row['height'] .'" class="image" />';
        }?>

<?php }
}?>
</div>