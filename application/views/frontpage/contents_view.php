<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contents<?php if( isset($content['sidebar']) && @$content['content_id']!=23 ) echo " contents-width"?>">
<?php
if( @$content!='' ){
    if( $content['content_id']==23 ) {
        echo '<h1 class="title fleft">'. $content['title'] .'</h1>';
        echo '<div class="fright" style="font-size:150%">';
        require(APPPATH . 'views/includes/sidebar_inc.php');
        echo '</div><div class="clear"></div>';
    }else{
        if( $content['show_title']==1 ) echo '<h1 class="title">'. $content['title'] .'</h1>';
    }

    $html = @$content['content'];
    $var = extract_var($html, '{', '}');
    echo $html;

    foreach( $var as $val){
        $this->view('frontpage/'.$val.'_view');
    }
}
?>
</div>