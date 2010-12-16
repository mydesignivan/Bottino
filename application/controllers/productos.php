<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Productos extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();

        $this->load->model('contents_model');
        $this->load->model('products_model');
        $this->_data=array(
            'tlp_title'            => TITLE_PRODUCTOS,
            'tlp_meta_description' => META_DESCRIPTION_PRODUCTOS,
            'tlp_meta_keywords'    => META_KEYWORDS_PRODUCTOS,
            'listMenu'             => $this->contents_model->get_menu()
        );
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $total_segments = $this->uri->total_segments();
        if( $total_segments==1 ) redirect($this->config->item('base_url'));

        $info = $this->products_model->get_list_front($this->uri->segment($total_segments));
        if( !$info ) redirect($this->config->item('base_url'));
        
        if( isset($info['sidebar']['gallery']) ) $this->assets->add_js_group('plugins_adgallery');
        $this->_render('front/products_view', array_merge($this->_data, array(
            'info' => $info
        )));
        //print_array($data,true);
    }

    public function search(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->helper('text');
            $this->_render('front/products_resultsearch_view', array_merge($this->_data, array(
                'info' => $this->products_model->search()
            )));
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}