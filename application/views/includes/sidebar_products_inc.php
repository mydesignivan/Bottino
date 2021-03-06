<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="sidebar">
<?php if( isset($info['sidebar']['menu']) ) {?>
    <ul class="menu-sidebar">
<?php
    $segs = $this->uri->segment_array();
    $lastSeg = count($segs)==3 ? $segs[count($segs)-1] : $segs[count($segs)];
    foreach( $info['sidebar']['menu'] as $row ){
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

<?php if( isset($info['sidebar']['gallery']) ) {?>
    <div id="gallery" class="ad-gallery">
        <div class="ad-image-wrapper"></div>
        <div class="ad-nav">
            <div class="ad-thumbs">
                <ul class="ad-thumb-list">
            <?php
            $n=-1;
            foreach( $info['sidebar']['gallery'] as $row ){$n++;?>
                    <li>
                        <a href="<?=UPLOAD_PATH_PRODUCTS.$row['image']?>"><img src="<?=UPLOAD_PATH_PRODUCTS.$row['thumb']?>" title="<?php if( strpos($row['title'], '{')===false ) echo $row['title']?>" alt="<?//=$row['thumb']?>" class="image<?=$n?>" /></a>
                    </li>
            <?php }?>
                </ul>
            </div>
        </div>
    </div>
<?php }?>
</div>