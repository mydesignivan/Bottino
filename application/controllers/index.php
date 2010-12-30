<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();

        $this->load->model('contents_model');
        $this->load->helpers('form');
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $ref = $this->uri->segment(1);
        $params = $this->_get_params($ref);

        if( $ref=="productos" && $this->uri->segment(2)=="leermas" ){
            $ref = $this->uri->segment(3);
        }else{
            $ref = $ref=="" ? "home" : null;
        }

        $content = $this->contents_model->get_content($ref);
        if( $content=="" ) redirect(base_url());
            
        if( isset($content['sidebar']['gallery']) ) $this->assets->add_js_group('plugins_adgallery');
        if( strpos($content['content'], '{chart}')!==FALSE ) {
            $this->assets->add_js_group('plugins_tooltip');
            $this->assets->add_js('class/chart');
            $this->assets->add_css('view_chart');
        }
        
        $this->_render('front/contents_view', array(
            'listMenu'             => $this->contents_model->get_menu(),
            'content_footer'       => $this->contents_model->get_content('footer'),
            'tlp_title'            => $params['title'],
            'tlp_meta_description' => $params['meta_description'],
            'tlp_meta_keywords'    => $params['meta_keywords'],
            'reference'            => $params['reference'],
            'content'              => $content
        ));
    }

    public function search(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->helper('text');
            $this->_render('front/products_resultsearch_view', array(
                'listMenu'             => $this->contents_model->get_menu(),
                'tlp_title'            => TITLE_PRODUCTOS,
                'tlp_meta_description' => META_DESCRIPTION_PRODUCTOS,
                'tlp_meta_keywords'    => META_KEYWORDS_PRODUCTOS,
                'listResult'           => $this->contents_model->search()
            ));
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_params($ref){
         switch($ref){
             default:
                 return array(
                     'title'            => TITLE_INDEX,
                     'meta_description' => META_DESCRIPTION_INDEX,
                     'meta_keywords'    => META_KEYWORDS_INDEX,
                     'reference'        => 'home'
                 );
             break;
             case 'empresa':
                 return array(
                     'title'            => TITLE_EMPRESA,
                     'meta_description' => META_DESCRIPTION_EMPRESA,
                     'meta_keywords'    => META_KEYWORDS_EMPRESA,
                     'reference'        => 'empresa'
                 );
             break;
             case 'productos':
                 return array(
                     'title'            => TITLE_PRODUCTOS,
                     'meta_description' => META_DESCRIPTION_PRODUCTOS,
                     'meta_keywords'    => META_KEYWORDS_PRODUCTOS,
                     'reference'        => 'productos'
                 );
             break;
             case 'energia-renovable':
                 return array(
                     'title'            => TITLE_ENERGIARENOVABLE,
                     'meta_description' => META_DESCRIPTION_ENERGIARENOVABLE,
                     'meta_keywords'    => META_KEYWORDS_ENERGIARENOVABLE,
                     'reference'        => 'energia-renovable'
                 );
             break;
             case 'servicios':
                 return array(
                     'title'            => TITLE_SERVICIOS,
                     'meta_description' => META_DESCRIPTION_SERVICIOS,
                     'meta_keywords'    => META_KEYWORDS_SERVICIOS,
                     'reference'        => 'servicios'
                 );
             break;
             case 'representaciones':
                 return array(
                     'title'            => TITLE_REPRESENTACIONES,
                     'meta_description' => META_DESCRIPTION_REPRESENTACIONES,
                     'meta_keywords'    => META_KEYWORDS_REPRESENTACIONES,
                     'reference'        => 'representaciones'
                 );
             break;
             case 'obras':
                 return array(
                     'title'            => TITLE_OBRAS,
                     'meta_description' => META_DESCRIPTION_OBRAS,
                     'meta_keywords'    => META_KEYWORDS_OBRAS,
                     'reference'        => 'obras'
                 );
             break;
             case 'testimoniales':
                 return array(
                     'title'            => TITLE_TESTIMONIALES,
                     'meta_description' => META_DESCRIPTION_TESTIMONIALES,
                     'meta_keywords'    => META_KEYWORDS_TESTIMONIALES,
                     'reference'        => 'testimoniales'
                 );
             break;
         }
    }

}