<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="container-sudoslider">
    <div id="sudo-slider">
        <ul class="contslider">
    <?php foreach( $list as $row ){?>
            <li class="item">
                <div class="cont">
                    <?=$row['testimonio']?><br/><br/>
                    <span class="autor"><?=$row['autor']?></span><br />
                    <?php if( !empty($row['cargo']) ){?> <span class="cargo"><?=$row['cargo']?></span><br /><?php }?>
                    <?php if( !empty($row['empresa']) ){?> <span class="empresa"><?=$row['empresa']?></span><br /><?php }?>
                </div>
            </li>
    <?php }?>
        </ul>
    </div>
    <a class="link-prev" href="#"><img width="32" height="64" alt="Anterior" src="public/images/testimoniales-bg-arrow-left.jpg"></a>
    <a class="link-next" href="#"><img width="32" height="64" alt="Siguiente" src="public/images/testimoniales-bg-arrow-right.jpg"></a>
</div>
