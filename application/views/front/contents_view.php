<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contents<?php if( isset($content['sidebar']) && @$content['content_id']!=23 && strpos(@$content['content'], '{chart}')===FALSE ) echo " contents-width"?>">
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

    if( strpos($html, '{chart}')!==FALSE ){
        require(APPPATH . 'views/front/chart_view.php');

    }else{
        $var = extract_var($html, '{', '}', true);

        if( $this->uri->segment(2)=="leermas" ) {
            $strsearch = $this->uri->segment(4);
            $html = preg_replace("/".$strsearch."/i", '<span class="resalt">'.$strsearch.'</span>', $html);
            $strsearch = preg_replace('/á/i', 'a', $strsearch);
            $strsearch = preg_replace('/é/i', 'e', $strsearch);
            $strsearch = preg_replace('/í/i', 'i', $strsearch);
            $strsearch = preg_replace('/ó/i', 'o', $strsearch);
            $strsearch = preg_replace('/ú/i', 'u', $strsearch);
            $html = preg_replace("/".$strsearch."/i", '<span class="resalt">'.$strsearch.'</span>', $html);
        }

        echo $html;

        foreach( $var as $val){
            $this->view('front/'. strip_tags(trim($val['val'])) .'_view');
        }

    }

}
?>
</div>